<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    public $username;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if ($user->password !== md5($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->_id = $user->id_user;
                $this->username = $user->username;

                // insert into the table sesion.
                $sql = "insert into sesion(id_sesion,id_user) "
                        . "values(DEFAULT,'$user->id_user')";
                $connection = Yii::app()->db;
                $command = $connection->createCommand($sql);
                $command->execute();
                $this->errorCode = self::ERROR_NONE;
            }
        }
        return !$this->errorCode;
    }
    
    /**
     * @return integer the ID of the user record.
     */
    public function getId() {
        return $this->_id;
    }

}
