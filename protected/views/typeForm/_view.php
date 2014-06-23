<?php
/* @var $this TypeFormController */
/* @var $data TypeForm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_type_form')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_type_form), array('view', 'id'=>$data->id_type_form)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_type_form')); ?>:</b>
	<?php echo CHtml::encode($data->name_type_form); ?>
	<br />


</div>