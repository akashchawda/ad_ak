<?php
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RandomnoForm extends CFormModel
{
	public $httpd_password;
        // public $email;
	//public $password;
	//public $rememberMe;
        
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array
                (
			// username and password are required
			array('httpd_password', 'required'),
                        // email is required
			//array('email', 'required'),
			// rememberMe needs to be a boolean
			//array('rememberMe', 'boolean'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}
	/**
	 * Declares attribute labels.
	 */
	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	
}
