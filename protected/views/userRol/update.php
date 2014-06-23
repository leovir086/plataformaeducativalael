<?php
/* @var $this UserRolController */
/* @var $model UserRol */

$this->breadcrumbs=array(
	'User Rols'=>array('index'),
	$model->id_user_rol=>array('view','id'=>$model->id_user_rol),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserRol', 'url'=>array('index')),
	array('label'=>'Create UserRol', 'url'=>array('create')),
	array('label'=>'View UserRol', 'url'=>array('view', 'id'=>$model->id_user_rol)),
	array('label'=>'Manage UserRol', 'url'=>array('admin')),
);
?>

<h1>Update UserRol <?php echo $model->id_user_rol; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>