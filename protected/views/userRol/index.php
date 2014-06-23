<?php
/* @var $this UserRolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Rols',
);

$this->menu=array(
	array('label'=>'Create UserRol', 'url'=>array('create')),
	array('label'=>'Manage UserRol', 'url'=>array('admin')),
);
?>

<h1>User Rols</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
