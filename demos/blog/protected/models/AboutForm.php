<?php
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AboutForm extends CFormModel
{
	public $contactName;
        public $secEmail;
	

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
			array('contactName,secEmail', 'required'),
                        // email is required
			array('secEmail', 'email'),
			
		);
	}

	
}
