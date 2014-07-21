<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Usuarios',
);
?>

<h1>Usuarios</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'sortableAttributes' => array(
        'email',
        'username',
    ),
    'template' => '{sorter}{pager}{items}{sorter}{pager}',
));
?>
