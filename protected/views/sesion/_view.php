<?php
/* @var $this SesionController */
/* @var $data Sesion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sesion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sesion), array('view', 'id'=>$data->id_sesion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::encode($data->pid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_sesion')); ?>:</b>
	<?php echo CHtml::encode($data->start_sesion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_sesion')); ?>:</b>
	<?php echo CHtml::encode($data->end_sesion); ?>
	<br />


</div>