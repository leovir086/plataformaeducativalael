<?php
/* @var $this OcupationController */
/* @var $data Ocupation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ocupation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ocupation), array('view', 'id'=>$data->id_ocupation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocu_id_ocupation')); ?>:</b>
	<?php echo CHtml::encode($data->ocu_id_ocupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ocupation')); ?>:</b>
	<?php echo CHtml::encode($data->name_ocupation); ?>
	<br />


</div>