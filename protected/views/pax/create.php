<?php
/* @var $this PaxController */
/* @var $model Pax */

$this->breadcrumbs=array(
	'Paxes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pax', 'url'=>array('index')),
	array('label'=>'Manage Pax', 'url'=>array('admin')),
);
?>

<h1>Create Pax</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>