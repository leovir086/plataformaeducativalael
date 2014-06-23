<?php
/* @var $this TypeFormController */
/* @var $model TypeForm */

$this->breadcrumbs=array(
	'Type Forms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TypeForm', 'url'=>array('index')),
	array('label'=>'Manage TypeForm', 'url'=>array('admin')),
);
?>

<h1>Create TypeForm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>