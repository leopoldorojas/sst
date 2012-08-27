<?php
/* @var $this ActivityServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Activity Services',
);

$this->menu=array(
	array('label'=>'Link Activity and Service', 'url'=>array('create')),
	array('label'=>'Manage Activities and Services', 'url'=>array('admin')),
);
?>

<h1>Activities and Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
