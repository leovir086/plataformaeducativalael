<?php
/* @var $this TypeFormController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Type Forms',
);

$this->menu=array(
	array('label'=>'Create TypeForm', 'url'=>array('create')),
	array('label'=>'Manage TypeForm', 'url'=>array('admin')),
);
?>

<h1>Type Forms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
