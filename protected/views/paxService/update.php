<?php
/* @var $this PaxServiceController */
/* @var $model PaxService */

$this->breadcrumbs=array(
	'Pax Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaxService', 'url'=>array('index')),
	array('label'=>'Create PaxService', 'url'=>array('create')),
	array('label'=>'View PaxService', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PaxService', 'url'=>array('admin')),
);
?>

<h1>Update PaxService <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>