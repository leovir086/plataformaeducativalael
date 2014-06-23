<?php
/* @var $this SesionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sesions',
);

$this->menu=array(
	array('label'=>'Create Sesion', 'url'=>array('create')),
	array('label'=>'Manage Sesion', 'url'=>array('admin')),
);
?>

<h1>Sesions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
