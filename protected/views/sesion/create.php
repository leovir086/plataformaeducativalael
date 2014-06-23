<?php
/* @var $this SesionController */
/* @var $model Sesion */

$this->breadcrumbs=array(
	'Sesions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sesion', 'url'=>array('index')),
	array('label'=>'Manage Sesion', 'url'=>array('admin')),
);
?>

<h1>Create Sesion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>