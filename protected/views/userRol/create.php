<?php
/* @var $this UserRolController */
/* @var $model UserRol */

$this->breadcrumbs=array(
	'User Rols'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserRol', 'url'=>array('index')),
	array('label'=>'Manage UserRol', 'url'=>array('admin')),
);
?>

<h1>Create UserRol</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>