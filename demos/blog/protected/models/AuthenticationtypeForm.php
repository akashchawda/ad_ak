<?php
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AuthenticationtypeForm extends CFormModel
{
	//public $authenticationTypeVar;
       // public $email;
	//public $password;
	//public $rememberMe;
        public $authenticity;

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
			array('authenticity', 'required'),
                    
                        // email is required
			//array('email', 'required'),
			// rememberMe needs to be a boolean
			//array('rememberMe', 'boolean'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}
	
        /*public function authenticationtype()
        {
            $this->_identity=new UserIdentity($this->authenticity);
        }*/
       /* public function getauthenticityOptions()
        {
            return array(
                        1=>'Send verification code on secondary Email Id',
                        2=>'Send verification code on mobile via SMS',
                        3=>'Upload digital certificate',
                        );
        }*/
}