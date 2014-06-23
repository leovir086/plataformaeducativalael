<?php
/* @var $this RolController */
/* @var $data Rol */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rol')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rol), array('view', 'id'=>$data->id_rol)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_rol')); ?>:</b>
	<?php echo CHtml::encode($data->name_rol); ?>
	<br />


</div>