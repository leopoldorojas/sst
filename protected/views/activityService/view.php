<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */

$this->breadcrumbs=array(
	'Activity Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ActivityService', 'url'=>array('index')),
	array('label'=>'Create ActivityService', 'url'=>array('create')),
	array('label'=>'Update ActivityService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ActivityService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ActivityService', 'url'=>array('admin')),
);
?>

<h1>View ActivityService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'activity_id',
		'service_id',
		'room',
		'notes',
		'createdon',
	),
)); ?>
