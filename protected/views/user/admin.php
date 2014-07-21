<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Administrador',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Usuarios</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo debe hacerse la comparación.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_user',
                array(
                    'name' =>'id_ocupation',
                    'value' => '$data->idOcupation->name_ocupation',
                    'filter' => Ocupation::getListOcupations(),
                ),
		'email',
		'username',
		'first_name',
		'last_name',
		'date_birth',
		array(
                    'name' => 'sex',
                    //'value' => 'Usuario::getSex($data->sex)',
                    //'filter' => Usuario::getSex($data->sex),
                ),
                array(
                    'class' => 'FlagColumn',
                    'name'=> 'state_user'
                ),
		array(
			'class'=>'CButtonColumn',
                        'header' => 'Accion',
                        'template' => '{view}{update}',
		),
	),
)); ?>
