<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */

$this->breadcrumbs=array(
	'Activity Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Activities and Services', 'url'=>array('index')),
	array('label'=>'Link Activity and Service', 'url'=>array('create')),
	array('label'=>'View link of Activity Service', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Activities and Services', 'url'=>array('admin')),
);
?>

<h1>Update Activity Service <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>