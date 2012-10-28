<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Service', 'url'=>array('index')),
	array('label'=>'Create Service', 'url'=>array('create')),
	array('label'=>'Update Service', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Service', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Service', 'url'=>array('admin')),
);
?>

<h1>View Service #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'booking_id',
		'day',
		'seq',
		'delivery_date',
		'description',
		'pickup',
		'pickuptime',
		'dropoff',
		'dropofftime',
		'voucher',
		'supplier',
		'guide',
		'pax_number',
		'ops',
		'sell',
		'cost',
		'service_type',
		'createdon',
	),
)); ?>
