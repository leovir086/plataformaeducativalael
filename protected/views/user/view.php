<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user,
);

$this->menu=array(
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id_user), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1>Ver Usuario #<?php echo $model->id_user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		'id_ocupation',
		'email',
		'username',
		'first_name',
		'last_name',
		'date_birth',
		'sex',
	),
)); ?>
