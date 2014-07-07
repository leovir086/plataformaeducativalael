<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Inicio Sesion';
$this->breadcrumbs = array(
    'Inicio Sesion',
);
?>

<h1>Login</h1>

<p>Por favor complete el siguiente formulario con sus datos de acceso:</p>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <p class="note">Los campos que lleven <span class="required">*</span> son requeridos.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
<?php echo $form->textField($model, 'username'); ?>
<?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
<?php echo $form->passwordField($model, 'password'); ?>
<?php echo $form->error($model, 'password'); ?>
        <p class="hint">
            Deberias Iniciar sesion con cuenta de: <kbd>usuario </kbd>/<kbd>contrasenia</kbd>.
        </p>
    </div>
    <p>
<?php //echo "No recuerdo nombre de usuario o contraseña? Ir a" ?>
        <?php //echo CHtml::link('Recuperar Contrasenia', array('site/recovery')); ?>
    </p>
    <p>
<?php echo "¿No tienes una cuenta todavía? Ir a" ?>
        <?php echo CHtml::link('Registro', array('user/create')); ?>
    </p>
    <div class="row buttons">
    <?php echo CHtml::submitButton('Sig in'); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
