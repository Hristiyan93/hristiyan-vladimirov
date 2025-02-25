<?php

class Models_Wrapper_User extends Zend_Db_Table_Row{
    
    const INFO_NAME = 'fulname';
    const INFO_PICTURE = 'picture';
    
    function hasImage(){
        return file_exists($this->getImagePath());
    }
    
    function getImagePath(){
        return ROOT_PATH.'/www/images/users/' . $this->id . '.png';
    }
    
    function getImageUrl(){
        return '/images/users/' . $this->id . '.png';
    }
    
    function uploadPicture($file){
    
        $images = new Models_Images();
    
        $image = $images->receiveFile($file);
        if(!empty($image)){
            $image->save($this->getImagePath(), 270, 263);
            $image->delete();
        }
    }
    
    function delete(){
        if($this->hasImage()){
            unlink($this->getImagePath());
        }
        parent::delete();
    }
    
    function activate(){
        $this->status = Models_Users::STATUS_ACTIVE;
        $this->save();
    }
    
    function getFullname(){
        return $this->firstname . ' ' . $this->lastname;
    }
    
    function updatePassword($oldPassword, $newPassword){
        if(!strcasecmp($this->password, sha1($oldPassword))){
            $this->password = sha1($newPassword);
            $this->save();
        }
    }
}