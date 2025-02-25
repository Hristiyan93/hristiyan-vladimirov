<?php

class Auth_Adapter implements Zend_Auth_Adapter_Interface
{
    /**
    * @var Models_Wrapper_User
    */
	protected $user;
	
	function __construct($user)
	{
		$this->user = $user;
	}
	
	function authenticate()
	{
		if(null===$this->user)
		{
			return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND, null, array('Невалидно потребителско име или парола'));
		}
		if($this->user->status!=Models_Users::STATUS_ACTIVE)
		{
			return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, null, array('Потребител "'. $this->user->username . '" не е активен'));
		}
		return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $this->user, array('Login success'));
	}
}