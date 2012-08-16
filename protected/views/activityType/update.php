<?php
/* @var $this ActivityTypeController */
/* @var $model ActivityType */

$this->breadcrumbs=array(
	'Activity Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ActivityType', 'url'=>array('index')),
	array('label'=>'Create ActivityType', 'url'=>array('create')),
	array('label'=>'View ActivityType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ActivityType', 'url'=>array('admin')),
);
?>

<h1>Update ActivityType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>