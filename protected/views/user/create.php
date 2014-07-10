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

<p>
    <?php echo "Si tienes una cuenta. Ir a" ?>
    <?php echo CHtml::link('Login', array('site/login')); ?>
</p>

<h1>Registro</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>