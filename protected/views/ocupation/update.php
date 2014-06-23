<?php
/* @var $this OcupationController */
/* @var $model Ocupation */

$this->breadcrumbs=array(
	'Ocupations'=>array('index'),
	$model->id_ocupation=>array('view','id'=>$model->id_ocupation),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ocupation', 'url'=>array('index')),
	array('label'=>'Create Ocupation', 'url'=>array('create')),
	array('label'=>'View Ocupation', 'url'=>array('view', 'id'=>$model->id_ocupation)),
	array('label'=>'Manage Ocupation', 'url'=>array('admin')),
);
?>

<h1>Update Ocupation <?php echo $model->id_ocupation; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>