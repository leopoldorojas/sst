<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Service', 'url'=>array('index')),
	array('label'=>'Create Service', 'url'=>array('create')),
	array('label'=>'View Service', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Service', 'url'=>array('admin')),
);
?>

<h1>Update Service <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>