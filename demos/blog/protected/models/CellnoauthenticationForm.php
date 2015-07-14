<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CellnoauthenticationForm extends CFormModel {

    public $cellno;

    public function rules() {
        return array
            (
            array('cellno', 'required'),
            array('cellno', 'numerical',
                'integerOnly' => true,
                'min' => 1000,
                'max' => 9999,
                'tooSmall' => 'Enter only last 4 digit of your mobile number',
                'tooBig' => 'Enter only last 4 digit of your mobile number'),
        );
    }

    public function checkCellno() {
        //echo substr(Yii::app()->user->ldapCellno, -4, 4);
       //echo "**********";
       // echo Yii::app()->user->ldapCellno;
        if(!isset(Yii::app()->user->ldapCellno) || is_empty(Yii::app()->user->ldapCellno))
        {
                        $this->addError('cellno', 'Incorrect mobile no.');
            return false;
        }
        elseif ($this->cellno === substr(Yii::app()->user->ldapCellno, -4, 4)) {
            return true;
        } else {
            $this->addError('cellno', 'Incorrect mobile no.');
            return false;
        }
    }

}

