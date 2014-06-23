<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'direccion_correo *:'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_usuario *:'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'contrasenia * :'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'repetir_contrasenia * :'); ?>
        <?php echo $form->passwordField($model, 'password_again', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'password_again'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombres:'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'apellidos:'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'Profesion * :'); ?>

        <table>
            <tr><td><?php
                    echo $form->dropDownList($model, 'id_ocupation2', CHtml::listData(Ocupation::model()->findAll('ocu_id_ocupation IS NULL'), 'id_ocupation', 'name_ocupation'), array(
                        'prompt' => 'Seleccionar Categoria',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('User/select'),
                            'update' => '#' . CHtml::activeId($model, 'id_ocupation'),
                        ),
                            )
                    );
                    ?> 
                    <?php echo $form->error($model, 'id_ocupation2'); ?>
                </td>
                <td><?php echo $form->dropDownList($model, 'id_ocupation', array('prompt' => 'Selecionar sub-categoria')); ?>
                    <?php echo $form->error($model, 'id_ocupation'); ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fecha_nacimiento :'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'date_birth',
            'options' => array(
                'showOn' => 'both',
                'dateFromat' => 'yyyy-mm-dd',
                'showOtherMonths' => true,
                'selectOtherMonths' => true,
                'changeYear' => true,
                'changeMonth' => true,
            ),
            'htmlOptions' => array(
                'size' => '10', // textField size
                'maxlength' => '10', // textField maxlength
            ),
        ));
        ?>
        <?php echo $form->error($model, 'date_birth:'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'sexo:'); ?>
        <?php echo $form->dropDownList($model, 'sex', array('M' => 'Masculino', 'F' => 'Femenino')) ?>
        <?php echo $form->error($model, 'sex'); ?>
    </div>
    <div class="row">
        <?php echo CHtml::activeLabel($model, 'validation') ?>
        <?php
        $this->widget('application.extensions.recaptcha.EReCaptcha', array('model' => $model, 'attribute' => 'validation',
            'theme' => 'red', 'language' => 'es_ES',
            'publicKey' => '6Le2OPUSAAAAAPdAbpZg59yctT_ZJ4cTexU1GwGK'))
        ?>
<?php echo CHtml::error($model, 'validation'); ?>
    </div>


    <div class="row">
<?php echo $form->hiddenField($model, 'facebook_id'); ?>
    </div>

    <div class="row">
<?php echo $form->hiddenField($model, 'plus_id'); ?>
    </div>

    <div class="row">
<?php echo $form->hiddenField($model, 'twitter_id'); ?>
    </div>


    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Salvar'); ?>
    </div>


<?php $this->endWidget(); ?>

</div><!-- form -->