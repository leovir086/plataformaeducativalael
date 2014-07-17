<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Registro',
);

$this->menu = array(
    array('label' => 'List User', 'url' => array('index'), 'visible' => !Yii::app()->user->isGuest),
    array('label' => 'Manage User', 'url' => array('admin'), 'visible' => !Yii::app()->user->isGuest),
);
?>

<h1>Registro</h1>

<?php $this->renderPartial('createForm', array('model' => $model)); ?>