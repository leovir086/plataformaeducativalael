<?php
/* @var $this OcupationController */
/* @var $model Ocupation */

$this->breadcrumbs=array(
	'Ocupations'=>array('index'),
	$model->id_ocupation,
);

$this->menu=array(
	array('label'=>'List Ocupation', 'url'=>array('index')),
	array('label'=>'Create Ocupation', 'url'=>array('create')),
	array('label'=>'Update Ocupation', 'url'=>array('update', 'id'=>$model->id_ocupation)),
	array('label'=>'Delete Ocupation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ocupation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ocupation', 'url'=>array('admin')),
);
?>

<h1>View Ocupation #<?php echo $model->id_ocupation; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ocupation',
		'ocu_id_ocupation',
		'name_ocupation',
	),
)); ?>
