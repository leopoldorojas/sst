<?php
/* @var $this PaxController */
/* @var $model Pax */

$this->breadcrumbs=array(
	'Paxes'=>array('index'),
	$model->name,
);

$this->menu=array(
	// array('label'=>'List Pax', 'url'=>array('index')),
	array('label'=>'Create Pax', 'url'=>array('create')),
	array('label'=>'Update Pax', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pax', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pax', 'url'=>array('admin')),
);
?>

<h1>View Pax ID: <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		// 'booking_id',
		// 'booking.booking_code',

		array(
			'value'=>CHtml::link($model->booking_id,Yii::app()->controller->createUrl("booking/".$model->booking_id)),
			'label'=>'Booking Id',
			'type'=>'raw',
		),

		array(
			'value'=>CHtml::link($model->booking->booking_code,Yii::app()->controller->createUrl("booking/".$model->booking_id)),
			'label'=>'Booking Code',
			'type'=>'raw',
		),

		'name',
		'age',
		'passport',
		'height',
		'weight',
		'arrival_detail',
		'departure_detail',
		'room',
		'notes',
		'createdon',
	),
)); ?>
