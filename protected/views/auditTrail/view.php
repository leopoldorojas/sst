<?php
/* @var $this AuditTrailController */
/* @var $model AuditTrail */

$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AuditTrail', 'url'=>array('index')),
	// array('label'=>'Create AuditTrail', 'url'=>array('create')),
	// array('label'=>'Update AuditTrail', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete AuditTrail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuditTrail', 'url'=>array('admin')),
);
?>

<h1>View AuditTrail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'old_value',
		'new_value',
		'action',
		'model',
		'field',
		'stamp',
		'user_id',
		'model_id',
	),
)); ?>
