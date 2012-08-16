<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */

$this->breadcrumbs=array(
	'Activity Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ActivityService', 'url'=>array('index')),
	array('label'=>'Create ActivityService', 'url'=>array('create')),
	array('label'=>'View ActivityService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ActivityService', 'url'=>array('admin')),
);
?>

<h1>Update ActivityService <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>