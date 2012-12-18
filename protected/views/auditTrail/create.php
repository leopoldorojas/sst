<?php
/* @var $this AuditTrailController */
/* @var $model AuditTrail */

$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuditTrail', 'url'=>array('index')),
	array('label'=>'Manage AuditTrail', 'url'=>array('admin')),
);
?>

<h1>Create AuditTrail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>