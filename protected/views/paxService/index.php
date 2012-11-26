<?php
/* @var $this PaxServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pax Services',
);

$this->menu=array(
	array('label'=>'Create PaxService', 'url'=>array('create')),
	array('label'=>'Manage PaxService', 'url'=>array('admin')),
);
?>

<h1>Pax Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
