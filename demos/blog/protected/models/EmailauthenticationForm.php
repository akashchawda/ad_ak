<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class EmailauthenticationForm extends CFormModel {

    public $emailID;

    public function rules() {
        return array
            (
            array('emailID', 'required'),
            array('emailID', 'match', 'not' => TRUE, 'pattern' => '/@/', 'message' => 'Enter Email ID only before the @.')
        );
    }

    public function checkEmail() {
        $emailAt = explode("@", Yii::app()->user->ldapEmail);
        if ($this->emailID === $emailAt[0]) {
            return true;
        } else {
            $this->addError('emailID', 'Incorrect Email ID.');
            return false;
        }
    }

}
