<?php

class Models_Users extends Zend_Db_Table{
    
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_NOT_ACTIVATED = 'notactivated';
    
    protected $_name = 'users';
    protected $_rowClass = 'Models_Wrapper_User';
    
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    
    static $_statusList = array(
            self::STATUS_NOT_ACTIVATED => self::STATUS_NOT_ACTIVATED,
            self::STATUS_ACTIVE => self::STATUS_ACTIVE,
            self::STATUS_INACTIVE => self::STATUS_INACTIVE
    );
    
    static $_rolesList = array(
            self::ROLE_ADMIN => self::ROLE_ADMIN,
            self::ROLE_USER => self::ROLE_USER
    );
    
    function login($username, $password){
        $select = $this->select()
            ->where('username = ?', $username)
            ->where('password = sha1(?)', $password);
        return $this->fetchRow($select);
    }
    
    function findItem($id){
        $item = $this->find($id)->current();
        if(!$item){
            $item = $this->createRow();
        }
        return $item;
    }
    
    function saveItem($data){
        $id = isset($data['id'])?$data['id']:0;
        unset($data['id']);
        if(!empty($data['password'])){
            $data['password'] = sha1($data['password']);
        }
    
        $item = $this->find($id)->current();
        if(!$item){
            $item = $this->createRow($data);
        }else{
            $item->setFromArray($data);
        }
        $item->save();
        return $item;
    }
    
    function findByUsername($username){
        $select = $this->select()
            ->where('username = ?', $username)
            ->limit(1);
        return $this->fetchRow($select);
    }
    
    function findByActivationCode($code){
        $select = $this->select()
            ->where('activationCode = ?', $code)
            ->limit(1);
        return $this->fetchRow($select);
    }
    
    private function generateActivationCode($name, $email){
        return sha1(time() . $name . mt_rand() . $email);
    }
    
    function checkUserExists($email){
        return $this->fetchAll($this->select()->where('email = ?', $email))->count()>0;
    }
    
    function createUser($userInfo){
        $userInfo = array_merge($userInfo, array(
            'username' => $userInfo['email'],
            'password' => sha1($userInfo['password']),
            'activationCode' => $this->generateActivationCode($userInfo['firstname'] . ' ' . $userInfo['lastname'], $userInfo['email']),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_NOT_ACTIVATED,
            'picture' => '',
            'about' => ''
        ));
        $user = $this->createRow($userInfo);
        $user->save();
        return $user;
    }
    
}