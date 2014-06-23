<?php
/* @var $this FormController */
/* @var $model Form */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_form'); ?>
		<?php echo $form->textField($model,'id_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_type_form'); ?>
		<?php echo $form->textField($model,'id_type_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_form'); ?>
		<?php echo $form->textField($model,'name_form',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url_form'); ?>
		<?php echo $form->textField($model,'url_form',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->