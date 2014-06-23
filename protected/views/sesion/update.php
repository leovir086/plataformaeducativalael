<?php
/* @var $this SesionController */
/* @var $model Sesion */

$this->breadcrumbs=array(
	'Sesions'=>array('index'),
	$model->id_sesion=>array('view','id'=>$model->id_sesion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sesion', 'url'=>array('index')),
	array('label'=>'Create Sesion', 'url'=>array('create')),
	array('label'=>'View Sesion', 'url'=>array('view', 'id'=>$model->id_sesion)),
	array('label'=>'Manage Sesion', 'url'=>array('admin')),
);
?>

<h1>Update Sesion <?php echo $model->id_sesion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>