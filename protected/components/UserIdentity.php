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
        $user = User::model()->findByAttributes(array('username' => $this->username));

        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif (md5($this->password) !== $user->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->username = $user->username;
            $this->_id = $user->id_user;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;

            // insert into the table sesion.
            $sql = "insert into sesion(id_sesion,id_user) "
                    . "values(DEFAULT,'$user->id_user')";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $command->execute();
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
