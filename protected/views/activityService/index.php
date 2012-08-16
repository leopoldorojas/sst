<?php
/* @var $this ActivityServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Activity Services',
);

$this->menu=array(
	array('label'=>'Create ActivityService', 'url'=>array('create')),
	array('label'=>'Manage ActivityService', 'url'=>array('admin')),
);
?>

<h1>Activity Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
