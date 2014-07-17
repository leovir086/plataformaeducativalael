<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Registro',
);
?>

<p>
    <?php echo "Si tienes una cuenta. Ir a" ?>
    <?php echo CHtml::link('Login', array('/site/login')); ?>
</p>

<h1>Registro</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>