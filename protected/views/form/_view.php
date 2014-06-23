<?php
/* @var $this FormController */
/* @var $data Form */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_form')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_form), array('view', 'id'=>$data->id_form)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_type_form')); ?>:</b>
	<?php echo CHtml::encode($data->id_type_form); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_form')); ?>:</b>
	<?php echo CHtml::encode($data->name_form); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_form')); ?>:</b>
	<?php echo CHtml::encode($data->url_form); ?>
	<br />


</div>