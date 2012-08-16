<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */

$this->breadcrumbs=array(
	'Activity Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ActivityService', 'url'=>array('index')),
	array('label'=>'Manage ActivityService', 'url'=>array('admin')),
);
?>

<h1>Create ActivityService</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>