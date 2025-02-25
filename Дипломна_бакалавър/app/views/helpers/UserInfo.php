<?php

class Zend_View_Helper_UserInfo extends Zend_View_Helper_Abstract 
{
    protected $identity;
    
    function __construct(){
        $this->identity = Zend_Auth::getInstance()->getIdentity();
    }
    
    function userInfo($what)
    {
        $result = '';
        switch($what){
            case Models_Wrapper_User::INFO_PICTURE:{
                $result = $this->identity->getImageUrl();
                break;  
            }
            default:
                $result = $this->identity->getFullname();
                break;
        }
        return $result;
    }
}