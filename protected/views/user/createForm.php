<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Registro',
);
?>

<h1>Registro</h1>

<?php $this->renderPartial('_formRegister', array('model' => $model,'model_rol'=>$model_rol)); ?>