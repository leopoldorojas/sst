<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List Activity', 'url'=>array('index')),
	array('label'=>'Create Activity', 'url'=>array('create')),
	array('label'=>'Update Activity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Activity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
);
?>

<h1>View Activity ID: <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array('name'=>'activityType.description', 'label'=>'Activity Type'),
		'description',
		'activity_date',
		'activity_time',
		array('label'=>'Completed?','value'=>($model->completed) ? 'Yes' : 'No' ),
	),
)); ?>

<hr />

<?php 
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
    	'Services'=>array('ajax'=>$this->createUrl("service/ByActivity/$model->id")),
        'Employees'=>array('ajax'=>$this->createUrl("employee/ByActivity/$model->id")),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>