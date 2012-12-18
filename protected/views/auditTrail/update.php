<?php
/* @var $this AuditTrailController */
/* @var $model AuditTrail */

$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuditTrail', 'url'=>array('index')),
	// array('label'=>'Create AuditTrail', 'url'=>array('create')),
	array('label'=>'View AuditTrail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AuditTrail', 'url'=>array('admin')),
);
?>

<h1>Update AuditTrail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>