<?php
/* @var $this PaxServiceController */
/* @var $model PaxService */

$this->breadcrumbs=array(
	'Pax Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PaxService', 'url'=>array('index')),
	array('label'=>'Manage PaxService', 'url'=>array('admin')),
);
?>

<h1>Create PaxService</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>