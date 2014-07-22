<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index', 'login', 'logout', 'create', 'select', 'verify' actions
                'actions' => array('index', 'login', 'logout', 'create', 'select', 'verify', 'captcha', 'getOcupations'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'update' actions
                'actions' => array('update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin', 'delete', 'view', 'admin', 'register' actions
                'actions' => array('admin', 'delete', 'view', 'admin', 'register', 'flag'),
                'users' => array('administrador'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model for user autorregulado.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        // initialize the object
        $model = new User('create');
        // verify change for POST
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            // generate verify code
            $activationKey = md5($_POST['User']['email'] . time());
            $model->activationKey = $activationKey;
            // set state unable
            $model->state_user = Yii::app()->params['stateUserUnavailable'];
            // generate the url verify email
            $code = Yii::app()->getBaseUrl(true) . '/index.php/user/verify/activationKey/' . $activationKey;
            // save the data to model
            if ($model->save()) {
                // initialice UserRol
                $model_user_rol = new UserRol;
                // fill attributes
                $model_user_rol->id_user = $model->id_user;
                $model_user_rol->id_rol = Yii::app()->params['RolUserAutorregulado'];
                if ($model_user_rol->save()) {
                    // initialize the object
                    $mail = new YiiMailer();
                    // set properties
                    $mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->params['nameRegister']);
                    $mail->setSubject(Yii::app()->params['setSubjectRegister']);
                    $mail->setTo($_POST['User']['email']);
                    $mail->setBody(Yii::app()->params['setBodyRegister'] . $code . Yii::app()->params['setBodyBelowRegister']);
                    // send
                    if ($mail->send()) {
                        Yii::app()->user->setFlash('succeedSendRegister', Yii::app()->params['succeedSendRegister']);
                    } else {
                        Yii::app()->user->setFlash('worngSendRegister', Yii::app()->params['wrongSendRegister'] . $mail->getError());
                    }
                }
            }
        }
        // redirect create default
        $this->render('create', array('model' => $model));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_user));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Verify the code from user.
     * @param string
     *
     */
    public function actionVerify() {
        $activationKey = Yii::app()->getRequest()->getParam('activationKey');
        $data = "";
        // check the code no empty
        if (!empty($activationKey)) {
            $data = User::model()->find('LOWER(activationKey)=?', array($activationKey));
        }
        // check de data from table no empty
        if (!empty($data)) {
            /* update user to 1 => enable.
              $command->update('user', array('state'=>1), 'id_user=:id_user', array(':id_user'=>1)); */
            // update user to 1 => enable.
            $sql = "update user set state_user= 1, activationKey=1 where id_user =$data->id_user";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $command->execute();
            // display the login form
            $this->render('messageSucceedRegister', array('model' => $data));
        } else {
            $this->render('messageWrongRegister', array('model' => $data));
        }
    }

    /**
     * Function for show captcha image the action create
     */
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    /**
     * Get the items from table Ocupacion with foreign key to form create user
     */
    public function actionGetOcupations() {
        //check if isAjaxRequest and the needed GET params are set
        ECascadeDropDown::checkValidRequest();

        //load the cities for the current province id (=ECascadeDropDown::submittedKeyValue())
        $data = Ocupation::model()->findAll('ocu_id_ocupation=:id_ocupation', array(':id_ocupation' => ECascadeDropDown::submittedKeyValue())
        );
        //Convert the data by using
        //CHtml::listData, prepare the JSON-Response and Yii::app()->end
        ECascadeDropDown::renderListData($data, 'id_ocupation', 'name_ocupation');
    }

    /**
     * Create a new user for user admin.
     */
    public function actionRegister() {
        // initialice Rol
        $model_rol = new Rol;
        // initialice User
        $model = new User('register');
        // verify the POST on submit.
        if (isset($_POST['User'], $_POST['Rol'])) {
            // fill the attribute the model
            $model->attributes = $_POST['User'];
            $model_rol->attributes = $_POST['Rol'];
            // generate verify code
            $activationKey = md5($_POST['User']['email'] . time());
            $model->activationKey = $activationKey;
            // set state unable
            $model->state_user = Yii::app()->params['stateUserUnavailable'];
            // generate the url verify email
            $code = Yii::app()->getBaseUrl(true) . '/index.php/user/verify/activationKey/' . $activationKey;
            // validate both $model and $model_rol
            $valid = $model->validate();
            $valid = $model_rol->validate() && $valid;
            if ($valid) {
                // use false parameter to disable validation
                $model->save(false);
                // initialice UserRol
                $model_user_rol = new UserRol;
                // fill attributes
                $model_user_rol->id_user = $model->id_user;
                $model_user_rol->id_rol = $_POST['Rol']['id_rol'];
                if ($model_user_rol->save()) {
                    $mail = new YiiMailer();
                    // set properties
                    $mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->params['nameRegister']);
                    $mail->setSubject(Yii::app()->params['setSubjectRegister']);
                    $mail->setTo($_POST['User']['email']);
                    $mail->setBody(Yii::app()->params['setBodyRegister'] . $code . Yii::app()->params['setBodyBelowRegister']);
                    // send email
                    if ($mail->send()) {
                        Yii::app()->user->setFlash('succeedSendRegister', Yii::app()->params['succeedSendRegister']);
                    } else {
                        Yii::app()->user->setFlash('wrongSendRegister', Yii::app()->params['wrongSendRegister'] . $mail->getError());
                    }
                }
            }
        }
        // redirect createForm default
        $this->render('createForm', array('model' => $model, 'model_rol' => $model_rol));
    }

    /**
     * We need to implement actionFlag
     * @param type $pk
     * @param type $name
     * @param type $value
     */
    public function actionFlag($pk, $name, $value) {
        $model = $this->loadModel($pk);
        $model->{$name} = $value;
        $model->save(false);


        if (!Yii::app()->request->isAjaxRequest) {
            $this->redirect('admin');
        }
    }

}
