<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    public $ldapCellno = Null;
    public $ldapEmail = Null;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $options = Yii::app()->params['ldap'];
        $dc_string = "dc=" . implode(",dc=", $options['dc']);
        $connection = ldap_connect($options['host'], $options['port']);
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        if ($connection) {
            $search = ldap_search($connection, 'o=vecc', "uid=$this->username");
            $data = ldap_get_entries($connection, $search);
            
            if ($data["count"] == 1) {
                $this->_id = $this->username;
                $this->username = $this->username;
                $this->errorCode = self::ERROR_NONE;
                for ($i = 0; $i < $data["count"]; $i++) {
                if (isset($data[$i]["mail"][0])) {
//                    $this->ldapEmail = $data[$i]["mail"][0] ;
                    $this->setState('ldapEmail', $data[$i]["mail"][0]);
                }
                if (isset($data[$i]["mobile"][0])) {

                    $this->setState('ldapCellno', $data[$i]["mobile"][0]);
                } 
            }
               
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
        }
        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}