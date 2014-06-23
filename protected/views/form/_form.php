<?php
/* @var $this FormController */
/* @var $model Form */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_type_form'); ?>
		<?php echo $form->textField($model,'id_type_form'); ?>
		<?php echo $form->error($model,'id_type_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_form'); ?>
		<?php echo $form->textField($model,'name_form',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'name_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_form'); ?>
		<?php echo $form->textField($model,'url_form',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_form'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->