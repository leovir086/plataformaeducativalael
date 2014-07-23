<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property integer $id_ocupation
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $date_birth
 * @property string $sex
 * @property string $facebook_id
 * @property string $plus_id
 * @property string $twitter_id
 * 
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Content[] $contents
 * @property Reply[] $replies
 * @property Sesion[] $sesions
 * @property Ocupation $idOcupation
 * @property UserRol[] $userRols
 */
class User extends CActiveRecord {

    private $_identity;
    public $validation;
    public $id_ocupation2;
    public $password_again;
    public $activationKey;
    public $state_user;
    public $verifyCode;
    public static $array_sex = array('empty' => 'Seleccione Genero', 'm' => 'Masculino', 'f' => 'Femenino');

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, username, password, first_name, last_name', 'length', 'max' => 80),
            array('facebook_id, plus_id, twitter_id', 'length', 'max' => 8),
            array('date_birth', 'safe'),
            // scenario action create, register user controller
            array('email, username, password, password_again, id_ocupation, id_ocupation2, state_user', 'required', 'on' => 'create, registerUser'),
            array('email', 'email', 'on' => 'create, registerUser'),
            array('email, username', 'unique', 'on' => 'create, registerUser'),
            array('username','match','pattern' => '/^[A-Za-z0-9\s,]+$/u','message' => 'Invalidos caracteres en nombre.','on' => 'create, registerUser'),        
            array('password', 'compare', 'compareAttribute' => 'password_again', 'on' => 'create, registerUser'),
            array('id_ocupation', 'numerical', 'integerOnly' => true, 'on' => 'create, registerUser'),
            array('date_birth', 'type', 'type' => 'date', 'message' => '{attribute}: no puede ser fecha: yyyy-mm-dd', 'dateFormat' => 'yyyy-MM-dd', 'on' => 'create, registerUser'),
            array('sex', 'safe', 'on' => 'create, registerUser'),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'create'),
            array('activationKey', 'required'),
            // scenario action login site controller
            array('username', 'required', 'on' => 'login'),
            array('password', 'authenticate', 'on' => 'login'),
            // scenario action recovery site controller
            array('username', 'required', 'on' => 'recovery'),
            //@todo Please remove those attributes that should not be searched.
            array('id_user, id_ocupation, email, username, first_name, last_name, date_birth, sex', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comments' => array(self::HAS_MANY, 'Comment', 'id_user'),
            'contents' => array(self::HAS_MANY, 'Content', 'id_user'),
            'replies' => array(self::HAS_MANY, 'Reply', 'id_user'),
            'sesions' => array(self::HAS_MANY, 'Sesion', 'id_user'),
            'idOcupation' => array(self::BELONGS_TO, 'Ocupation', 'id_ocupation'),
            'rols' => array(self::MANY_MANY, 'Rol', 'user_rol(id_user,id_rol)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_user' => 'Id',
            'id_ocupation' => 'Ocupacion',
            'email' => 'Direccion de Correo',
            'username' => 'Nombre Usuario',
            'password' => 'Contrasenia',
            'first_name' => 'Nombres',
            'last_name' => 'Apellidos',
            'date_birth' => 'Fecha Nacimiento',
            'sex' => 'Sexo',
            'facebook_id' => 'Facebook',
            'plus_id' => 'Plus',
            'twitter_id' => 'Twitter',
            'id_ocupation2' => 'Sub Ocupacion',
            'verifyCode' => 'Codigo Verificacion',
            'password_again' => 'Repetir contrasenia',
            'state_user' => 'Estado Usuario',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_user', $this->id_user);
        $criteria->compare('id_ocupation', $this->id_ocupation);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('date_birth', $this->date_birth, true);
        $criteria->compare('sex', $this->sex, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            if (!$this->_identity->authenticate())
                $this->addError('password', 'Incorrect nombre de usuario o contrasenia.');
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
            $this->_identity->insertSesion();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = 3600 * 24 * 30; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }

    /**
     * 
     * @return type integer.
     */
    public function primaryKey() {
        return $this->id_user;
    }

    /*
     * Change the passwod encrypt to md5 in create user
     */

    public function beforeSave() {
        if ($this->isNewRecord) {
            $password = md5($this->password);
            $this->password = $password;
        }
        return true;
    }

    /**
     * Get the recent forms from the user id
     * @param int user id online sesion
     * @return array the most recently rols
     */
    public function getRecentRols($id_user) {
        return $this->with('rols')->findAll(array(
                    'condition' => 't.id_user=' . $id_user,
        ));
    }

    /**
     * Get the current filter property sex.
     * @param int $key
     * @return array
     */
    public static function getSex($key = null) {
        if ($key !== null)
            return self::$array_sex[$key];
        return self::$array_sex;
    }

}
