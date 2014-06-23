<?php
/* @var $this UserRolController */
/* @var $data UserRol */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user_rol')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_user_rol), array('view', 'id'=>$data->id_user_rol)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rol')); ?>:</b>
	<?php echo CHtml::encode($data->id_rol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />


</div>