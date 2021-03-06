<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<?php if (Yii::app()->user->hasFlash('succeedSendRegister')): ?>

    <div>
        <?php echo Yii::app()->user->getFlash('succeedSendRegister'); ?>
    </div>

<?php elseif (Yii::app()->user->hasFlash('wrongSendRegister')): ?>

    <div>
        <?php echo Yii::app()->user->getFlash('wrongSendRegister'); ?>
    </div>

<?php else: ?>

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

    <p class="note">Los campos que lleven <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password_again'); ?>
        <?php echo $form->passwordField($model, 'password_again', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'password_again'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 80)); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'id_ocupation'); ?>

        <table>
            <tr><td>
                    <?php
                    $ocupationItems = CHtml::listData(Ocupation::model()->findAll('ocu_id_ocupation IS NULL'), 'id_ocupation', 'name_ocupation');
                    echo CHtml::activeDropDownList($model, 'id_ocupation2', $ocupationItems,
                    array('id'=>'id_ocupation2', 'prompt'=> 'Seleccione Categoria'));
                    ?> 
                </td>
                <td>
                    <?php
                    
                    $ocupationChilds = CHtml::listData(Ocupation::model()->findAll('id_ocupation=:id_ocupation',
                    array(':id_ocupation'=>$model->id_ocupation)), 'id_ocupation', 'name_ocupation');
                    echo CHtml::activeDropDownList($model, 'id_ocupation', $ocupationChilds,
                    array('id'=>'id_ocupation', 'prompt'=> 'Seleccione Sub Categoria'));
                    
                    ECascadeDropDown::master('id_ocupation2')->setDependent('id_ocupation',
                            array('dependentLoadingLabel'=>'Loading ocupations ...'),
                            '/user/getOcupations');
                     
                     
                    ?>
                </td>
            </tr>
        </table>
    </div>
    

    <div class="row">
        <?php echo $form->labelEx($model, 'date_birth'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'date_birth',
            'options' => array(
                'showOn' => 'both',
                'dateFormat' => 'yy-mm-dd',
                'showOtherMonths' => true,
                'selectOtherMonths' => true,
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1950:'.date('Y'),
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
        <?php echo $form->labelEx($model, 'sex'); ?>
        <?php echo $form->dropDownList($model, 'sex', array('empty' => 'Seleccione Genero', 'm' => 'Masculino', 'f' => 'Femenino')) ?>
        <?php echo $form->error($model, 'sex'); ?>
    </div>



    <?php if (CCaptcha::checkRequirements()): ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode'); ?>
            </div>
            <div class="hint">Introduzca las letras que aparecen arriba.
                <br/>No hay distinción entre mayúsculas y minúsculas.</div>
            <?php echo $form->error($model, 'verifyCode'); ?>
        </div>
    <?php endif; ?>

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

<?php endif;?>