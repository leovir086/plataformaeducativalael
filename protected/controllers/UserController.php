<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index', 'view', 'login', 'logout', 'create', 'select', 'verify' actions
                'actions' => array('index', 'view', 'login', 'logout', 'create', 'select', 'verify'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new User('create');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            // generate verify code
            $activationKey = md5($_POST['User']['email'] . time());
            $model->activationKey = $activationKey;
            // set state unable
            $model->state_user = 0;
            // generate the url verify email
            $code = Yii::app()->getBaseUrl(true) . '/index.php/user/verify/activationKey/' . $activationKey;
            // save the data to model
            if ($model->save()) {
                $mail = new YiiMailer();
                // set properties
                $mail->setFrom(Yii::app()->params['_constant']['setFromRegister'], Yii::app()->params['_constant']['nameRegister']);
                $mail->setSubject(Yii::app()->params['_constant']['setSubjectRegister']);
                $mail->setTo(Yii::app()->params['adminEmail']);
                $mail->setBody(Yii::app()->params['_constant']['setBodyRegister'].$code.Yii::app()->params['_constant']['setBodyBelowRegister']);
                // send
                if ($mail->send()) {
                    Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                } else {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }
            }
            $this->redirect(array('view', 'id' => $model->id_user));
        }

        $this->render('create', array('model' => $model,));
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
     * Function authenticate user database.
     */
    public function actionLogin() {
        $model = new User;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Get the items from table Ocupacion with foreign key to form create user
     */
    public function actionSelect() {
        $data = Ocupation::model()->findAll('ocu_id_ocupation=:id_ocupation', array(':id_ocupation' => (int) $_POST['User']
            ['id_ocupation2']));
        $data = CHtml::listData($data, 'id_ocupation', 'name_ocupation');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
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
        }
        $this->render('messageWrongRegister', array('model' => $data));
    }

}
