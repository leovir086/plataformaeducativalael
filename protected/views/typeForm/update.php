<?php
/* @var $this TypeFormController */
/* @var $model TypeForm */

$this->breadcrumbs=array(
	'Type Forms'=>array('index'),
	$model->id_type_form=>array('view','id'=>$model->id_type_form),
	'Update',
);

$this->menu=array(
	array('label'=>'List TypeForm', 'url'=>array('index')),
	array('label'=>'Create TypeForm', 'url'=>array('create')),
	array('label'=>'View TypeForm', 'url'=>array('view', 'id'=>$model->id_type_form)),
	array('label'=>'Manage TypeForm', 'url'=>array('admin')),
);
?>

<h1>Update TypeForm <?php echo $model->id_type_form; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>