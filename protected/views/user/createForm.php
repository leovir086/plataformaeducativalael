<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'create-form',
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
            <tr><td><?php
                    echo $form->dropDownList($model, 'id_ocupation2', CHtml::listData(Ocupation::model()->findAll('ocu_id_ocupation IS NULL'), 'id_ocupation', 'name_ocupation'), array(
                        'prompt' => 'Seleccione Categoria',
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
                <td><?php echo $form->dropDownList($model, 'id_ocupation', array('prompt' => 'Selecione sub-categoria')); ?>
                    <?php echo $form->error($model, 'id_ocupation'); ?>
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
        <?php echo $form->dropDownList($model, 'sex', array('0' => 'Masculino', '1' => 'Femenino')) ?>
        <?php echo $form->error($model, 'sex'); ?>
    </div>
    
    
   

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Salvar'); ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form --><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

