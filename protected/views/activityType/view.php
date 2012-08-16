<?php
/* @var $this ActivityTypeController */
/* @var $model ActivityType */

$this->breadcrumbs=array(
	'Activity Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ActivityType', 'url'=>array('index')),
	array('label'=>'Create ActivityType', 'url'=>array('create')),
	array('label'=>'Update ActivityType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ActivityType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ActivityType', 'url'=>array('admin')),
);
?>

<h1>View ActivityType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'enabled',
		'service_types',
		'createdon',
	),
)); ?>
