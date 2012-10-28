<?php
/* @var $this PaxController */
/* @var $model Pax */

$this->breadcrumbs=array(
	'Paxes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Pax', 'url'=>array('index')),
	array('label'=>'Create Pax', 'url'=>array('create')),
	array('label'=>'View Pax', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pax', 'url'=>array('admin')),
);
?>

<h1>Update Pax <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>