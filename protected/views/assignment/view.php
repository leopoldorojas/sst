<?php
/* @var $this AssignmentController */
/* @var $model Assignment */

$this->breadcrumbs=array(
	'Assignments'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List Assignment', 'url'=>array('index')),
	array('label'=>'Create Assignment', 'url'=>array('create')),
	array('label'=>'Update Assignment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Assignment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Assignments', 'url'=>array('admin')),
);
?>

<h1>View Assignment ID: <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array('value'=>$model->employee->name . ' ' . $model->employee->lastname, 'label'=>'Employee'),
		array('name'=>'activity.description', 'label'=>'Activity Description'),
		'activity.activity_date',
		'activity.activity_time',
		'estimated_hours',
		'actual_hours',
		'createdon',
	),
)); ?>
