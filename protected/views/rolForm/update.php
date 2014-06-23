<?php
/* @var $this RolFormController */
/* @var $model RolForm */

$this->breadcrumbs=array(
	'Rol Forms'=>array('index'),
	$model->id_rol_form=>array('view','id'=>$model->id_rol_form),
	'Update',
);

$this->menu=array(
	array('label'=>'List RolForm', 'url'=>array('index')),
	array('label'=>'Create RolForm', 'url'=>array('create')),
	array('label'=>'View RolForm', 'url'=>array('view', 'id'=>$model->id_rol_form)),
	array('label'=>'Manage RolForm', 'url'=>array('admin')),
);
?>

<h1>Update RolForm <?php echo $model->id_rol_form; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>