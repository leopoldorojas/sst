<?php
/* @var $this PaxServiceController */
/* @var $model PaxService */

$this->breadcrumbs=array(
	'Pax Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PaxService', 'url'=>array('index')),
	array('label'=>'Create PaxService', 'url'=>array('create')),
	array('label'=>'Update PaxService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PaxService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaxService', 'url'=>array('admin')),
);
?>

<h1>View PaxService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pax_id',
		'service_id',
		'notes',
	),
)); ?>
