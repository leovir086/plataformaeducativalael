<?php
/* @var $this OcupationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ocupations',
);

$this->menu=array(
	array('label'=>'Create Ocupation', 'url'=>array('create')),
	array('label'=>'Manage Ocupation', 'url'=>array('admin')),
);
?>

<h1>Ocupations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
