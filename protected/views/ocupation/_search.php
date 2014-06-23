<?php
/* @var $this OcupationController */
/* @var $model Ocupation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ocupation'); ?>
		<?php echo $form->textField($model,'id_ocupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ocu_id_ocupation'); ?>
		<?php echo $form->textField($model,'ocu_id_ocupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_ocupation'); ?>
		<?php echo $form->textField($model,'name_ocupation',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->