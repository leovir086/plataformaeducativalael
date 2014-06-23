<?php
/* @var $this RolFormController */
/* @var $model RolForm */

$this->breadcrumbs=array(
	'Rol Forms'=>array('index'),
	$model->id_rol_form,
);

$this->menu=array(
	array('label'=>'List RolForm', 'url'=>array('index')),
	array('label'=>'Create RolForm', 'url'=>array('create')),
	array('label'=>'Update RolForm', 'url'=>array('update', 'id'=>$model->id_rol_form)),
	array('label'=>'Delete RolForm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rol_form),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RolForm', 'url'=>array('admin')),
);
?>

<h1>View RolForm #<?php echo $model->id_rol_form; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rol_form',
		'id_rol',
		'id_form',
	),
)); ?>
