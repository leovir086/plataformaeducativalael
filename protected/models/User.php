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
 * @property string $activationKey
 * @property numeric $state_user
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
            array('id_ocupation, email', 'required'),
            array('id_ocupation', 'numerical', 'integerOnly' => true),
            array('email, username, password, first_name, last_name', 'length', 'max' => 80),
            array('sex, facebook_id, plus_id, twitter_id', 'length', 'max' => 8),
            array('date_birth', 'safe'),
            array('email', 'email', 'on' => 'create'),
            array('email', 'unique', 'on' => 'create'),
            array('username',
                'match', 'not' => true, 'pattern' => '/[^a-zA-Z_0-9-]/',
                'message' => 'Invalidos caracteres en nombre usuario.',
                'on' => 'create'
            ),
            array('username', 'required', 'on' => 'create'),
            array('username', 'unique', 'on' => 'create'),
            array('password', 'authenticate', 'on' => 'login'),
            array('password', 'required'),
            array('password', 'compare', 'compareAttribute' => 'password_again', 'on' => 'create'),
            array('password_again', 'required', 'on' => 'create'),
            array('id_ocupation2', 'required'),
            array('validation',
                'application.extensions.recaptcha.EReCaptchaValidator',
                'privateKey' => '6Le2OPUSAAAAAPdAbpZg59yctT_ZJ4cTexU1GwGK',
                'on' => 'registerwcaptcha'
            ),
            array('activationKey', 'required', 'on' => 'create'),
            array('activationKey', 'unique', 'on' => 'create'),
            array('state_user', 'required', 'on' => 'create'),
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
            'userRols' => array(self::HAS_MANY, 'UserRol', 'id_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_user' => 'Id User',
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
            'validation' => Yii::t('demo', 'Ingrese ambas palabras separadas de un espacio:'),
            'id_ocupation2' => 'Elegir una Categoria',
            'password_again' => 'Repetir contrasenia',
            'verify_code' => 'Codigo Verificacion',
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
        $criteria->compare('password', $this->password, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('date_birth', $this->date_birth, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('facebook_id', $this->facebook_id, true);
        $criteria->compare('plus_id', $this->plus_id, true);
        $criteria->compare('twitter_id', $this->twitter_id, true);

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
        $password = md5($this->password);
        $this->password = $password;
        return true;
    }

}
