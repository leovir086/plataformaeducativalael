<?php
/* @var $this OcupationController */
/* @var $model Ocupation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ocupation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ocu_id_ocupation'); ?>
		<?php echo $form->textField($model,'ocu_id_ocupation'); ?>
		<?php echo $form->error($model,'ocu_id_ocupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_ocupation'); ?>
		<?php echo $form->textField($model,'name_ocupation',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'name_ocupation'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->