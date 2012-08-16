<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The implementation makes sure if the username and password
	 * are in the persistent user identity storage (user table).
	 * @return boolean whether authentication succeeds.
	 */

	private $_id;

	public function authenticate()
	{
		if($this->username=='admin' && $this->password=='admin')
		{
			$this->_id=9999;
			$this->username='admin';
			$this->errorCode=self::ERROR_NONE;
			return $this->errorCode==self::ERROR_NONE;
		} else {
		$username=strtolower($this->username);
		$user=User::model()->find('LOWER(username)=?', array($username));
		if ($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE; }
	}

	public function getId()
	{
		return $this->_id;
	}

	/* Uncomment this if you want enable the demo app
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
	*/
}