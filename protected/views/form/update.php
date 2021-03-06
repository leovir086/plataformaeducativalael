<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Forms'=>array('index'),
	$model->id_form=>array('view','id'=>$model->id_form),
	'Update',
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Create Form', 'url'=>array('create')),
	array('label'=>'View Form', 'url'=>array('view', 'id'=>$model->id_form)),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>

<h1>Update Form <?php echo $model->id_form; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>