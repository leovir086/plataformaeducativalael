<?php
/* @var $this UserRolController */
/* @var $model UserRol */

$this->breadcrumbs=array(
	'User Rols'=>array('index'),
	$model->id_user_rol,
);

$this->menu=array(
	array('label'=>'List UserRol', 'url'=>array('index')),
	array('label'=>'Create UserRol', 'url'=>array('create')),
	array('label'=>'Update UserRol', 'url'=>array('update', 'id'=>$model->id_user_rol)),
	array('label'=>'Delete UserRol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user_rol),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserRol', 'url'=>array('admin')),
);
?>

<h1>View UserRol #<?php echo $model->id_user_rol; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user_rol',
		'id_rol',
		'id_user',
	),
)); ?>
