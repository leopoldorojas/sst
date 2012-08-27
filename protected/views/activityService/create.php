<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */

$this->breadcrumbs=array(
	'Activity Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Activities and Services', 'url'=>array('index')),
	array('label'=>'Manage Activities and Services', 'url'=>array('admin')),
);
?>

<h1>Link Activity and Service</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>