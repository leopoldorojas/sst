<?php
/* @var $this ActivityTypeController */
/* @var $model ActivityType */

$this->breadcrumbs=array(
	'Activity Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List ActivityType', 'url'=>array('index')),
	array('label'=>'Create Activity Type', 'url'=>array('create')),
	array('label'=>'Update Activity Type', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Activity Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Activity Types', 'url'=>array('admin')),
);
?>

<h1>View Activity Type ID:<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'service_types',
		array('label'=>'Enabled?','value'=>($model->enabled) ? 'Yes' : 'No' ),
	),
)); ?>
