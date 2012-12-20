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
		array('value'=>$model->activity->activityType->description, 'label'=>'Activity Type'),
		array(
			'value'=>CHtml::link($model->employee->fullName,Yii::app()->controller->createUrl("employee/".$model->employee->id)),
			'label'=>'Employee',
			'type'=>'raw',
		),

		array(
			'value'=>CHtml::link($model->activity->activity_date,Yii::app()->controller->createUrl("activity/".$model->activity->id)),
			'label'=>'Activity Date',
			'type'=>'raw',
		),

		array(
			'value'=>CHtml::link($model->activity->activity_time,Yii::app()->controller->createUrl("activity/".$model->activity->id)),
			'label'=>'Activity Time',
			'type'=>'raw',
		),

		/* array(
			'value'=>CHtml::link($model->activity->description,Yii::app()->controller->createUrl("activity/".$model->activity->id)),
			'label'=>'Activity Description',
			'type'=>'raw',
		), */

		// 'activity.activity_date',
		// 'activity.activity_time',
		array('name'=>'activity.description', 'label'=>'Activity Description'),
		'estimated_hours',
		'actual_hours',
	),
)); ?>
