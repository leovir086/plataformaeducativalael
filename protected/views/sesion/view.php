<?php
/* @var $this SesionController */
/* @var $model Sesion */

$this->breadcrumbs=array(
	'Sesions'=>array('index'),
	$model->id_sesion,
);

$this->menu=array(
	array('label'=>'List Sesion', 'url'=>array('index')),
	array('label'=>'Create Sesion', 'url'=>array('create')),
	array('label'=>'Update Sesion', 'url'=>array('update', 'id'=>$model->id_sesion)),
	array('label'=>'Delete Sesion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sesion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sesion', 'url'=>array('admin')),
);
?>

<h1>View Sesion #<?php echo $model->id_sesion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sesion',
		'id_user',
		'pid',
		'start_sesion',
		'end_sesion',
	),
)); ?>
