<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Activity', 'url'=>array('index')),
	array('label'=>'Manage Activity', 'url'=>array('admin')),
);
?>

<h1>Create Activity</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>