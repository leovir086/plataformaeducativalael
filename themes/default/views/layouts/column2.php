<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
    <div id="content">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<div class="span-5 last">
    <div id="sidebar">
        
        <?php if(!Yii::app()->user->isGuest):?>
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => 'Operaciones',
        ));?>
        <?php $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'operations'),
        ));
        $this->endWidget();?>
        <?php $this->widget('UserMenu'); ?>
        <?php endif;?>
      
    </div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>