<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */

$this->breadcrumbs=array(
	'Activity Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Activities and Services', 'url'=>array('index')),
	array('label'=>'Link Activity and Service', 'url'=>array('create')),
	array('label'=>'Update Activity Service', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Unlink Activity Service', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Activities and Services', 'url'=>array('admin')),
);
?>

<h1>View link of Activity Service #<?php echo $model->id; ?></h1>

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
