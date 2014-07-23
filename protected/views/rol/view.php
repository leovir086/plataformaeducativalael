<?php
/* @var $this RolController */
/* @var $model Rol */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->id_rol,
);

$this->menu=array(
	array('label'=>'Actualizar Rol', 'url'=>array('update', 'id'=>$model->id_rol)),
	array('label'=>'Eliminar Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rol),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Ver Rol #<?php echo $model->id_rol; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rol',
		'name_rol',
	),
)); ?>
