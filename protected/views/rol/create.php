<?php
/* @var $this RolController */
/* @var $model Rol */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	'Registrar Rol',
);

?>

<h1>Registrar Rol</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>