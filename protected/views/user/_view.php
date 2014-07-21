<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id_user), array('view', 'id' => $data->id_user)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_ocupation')); ?>:</b>
    <?php echo CHtml::encode($data->idOcupation->name_ocupation); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::encode($data->username); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
    <?php echo CHtml::encode($data->first_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
    <?php echo CHtml::encode($data->last_name); ?>
    <br />

    <b> <?php echo CHtml::encode($data->getAttributeLabel('date_birth')); ?>:</b>
    <?php if($data->date_birth != Yii::app()->params['dateBirthEmpty']):?>
        <?php echo CHtml::encode($data->date_birth); ?>
    <?php endif;?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
    <?php if ($data->sex == Yii::app()->params['sexUserFemale']): ?>
        <?php echo CHtml::encode('Femenino'); ?>
    <?php elseif ($data->sex == Yii::app()->params['sexUserMale']): ?>
        <?php echo CHtml::encode('Masculino'); ?>
    <?php endif; ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('state_user')); ?>:</b>
    <?php if ($data->state_user == Yii::app()->params['stateUserUnavailable']): ?>
        <?php echo CHtml::encode('Inahabilitado'); ?>
    <?php elseif ($data->state_user == Yii::app()->params['stateUserAvailable']): ?>
        <?php echo CHtml::encode('Habilitado'); ?>
    <?php endif; ?>
    <br />
</div>