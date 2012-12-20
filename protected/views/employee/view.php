<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->name,
);

$this->menu=array(
	// array('label'=>'List Employee', 'url'=>array('index')),
	array('label'=>'Create Employee', 'url'=>array('create')),
	array('label'=>'Update Employee', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Employee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employees', 'url'=>array('admin')),
);
?>

<h1>View Employee ID: <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'lastname',
		'identification_number',
		'rol',
		'cost_per_hour',
	),
)); ?>

<hr />

<?php 
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Activities assigned from Today'=>array('ajax'=>$this->createUrl("activity/ByEmployee/$model->id/?lastMonth=false")),
        'Activities assigned last Month'=>array('ajax'=>$this->createUrl("activity/ByEmployee/$model->id/?lastMonth=true")),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>