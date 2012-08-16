<?php
/* @var $this ActivityTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Activity Types',
);

$this->menu=array(
	array('label'=>'Create ActivityType', 'url'=>array('create')),
	array('label'=>'Manage ActivityType', 'url'=>array('admin')),
);
?>

<h1>Activity Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
