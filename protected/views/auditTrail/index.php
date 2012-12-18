<?php
/* @var $this AuditTrailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Audit Trails',
);

$this->menu=array(
	// array('label'=>'Create AuditTrail', 'url'=>array('create')),
	array('label'=>'Manage AuditTrail', 'url'=>array('admin')),
);
?>

<h1>Audit Trails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
