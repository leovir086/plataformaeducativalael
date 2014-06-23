<?php
/* @var $this RolFormController */
/* @var $data RolForm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rol_form')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rol_form), array('view', 'id'=>$data->id_rol_form)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rol')); ?>:</b>
	<?php echo CHtml::encode($data->id_rol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_form')); ?>:</b>
	<?php echo CHtml::encode($data->id_form); ?>
	<br />


</div>