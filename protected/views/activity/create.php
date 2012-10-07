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

Yii::app()->clientScript->registerScript('checkAssign', "
$('.assignNow-check').change(function(){
	$('.assignService-form').toggle();
	return false;
});
");

Yii::app()->clientScript->registerScript('getSelectedService', "
function getService(id){
	$('input[name=selectedService]').val($.fn.yiiGridView.getSelection(id));
}
");
?>

<h1>Create Activity</h1>

<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'dataProvider'=>$dataProvider,
		'assignment'=>$assignment,
	));
?>