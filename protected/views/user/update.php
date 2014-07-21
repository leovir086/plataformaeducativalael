<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user=>array('view','id'=>$model->id_user),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id_user)),
);
?>

<h1>Actualizar Usuario <?php echo $model->id_user; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>