<?php
/* @var $this RolFormController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rol Forms',
);

$this->menu=array(
	array('label'=>'Create RolForm', 'url'=>array('create')),
	array('label'=>'Manage RolForm', 'url'=>array('admin')),
);
?>

<h1>Rol Forms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
