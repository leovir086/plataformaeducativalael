<?php
/* @var $this TypeFormController */
/* @var $model TypeForm */

$this->breadcrumbs=array(
	'Type Forms'=>array('index'),
	$model->id_type_form,
);

$this->menu=array(
	array('label'=>'List TypeForm', 'url'=>array('index')),
	array('label'=>'Create TypeForm', 'url'=>array('create')),
	array('label'=>'Update TypeForm', 'url'=>array('update', 'id'=>$model->id_type_form)),
	array('label'=>'Delete TypeForm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_type_form),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TypeForm', 'url'=>array('admin')),
);
?>

<h1>View TypeForm #<?php echo $model->id_type_form; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_type_form',
		'name_type_form',
	),
)); ?>
