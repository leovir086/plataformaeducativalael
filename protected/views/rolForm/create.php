<?php
/* @var $this RolFormController */
/* @var $model RolForm */

$this->breadcrumbs=array(
	'Rol Forms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RolForm', 'url'=>array('index')),
	array('label'=>'Manage RolForm', 'url'=>array('admin')),
);
?>

<h1>Create RolForm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>