<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Activity', 'url'=>array('index')),
	array('label'=>'Create Activity', 'url'=>array('create')),
	array('label'=>'View Activity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Activity', 'url'=>array('admin')),
);
?>

<h1>Update Activity <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>