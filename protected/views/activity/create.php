<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Activity', 'url'=>array('index')),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('checkDisplayForms', "
$('.displayForms-check').change(function(){
	$('.displayForms-form').toggle();
	return false;
});
");

Yii::app()->clientScript->registerScript('toggleAssignmentsForms', "
$('.assignServices-button').click(function(){
	$('.assignService-form').show();
	$('.assignEmployee-form').hide();
	return false;
});

$('.assignEmployees-button').click(function(){
	$('.assignService-form').hide();
	$('.assignEmployee-form').show();
	return false;
});
");

Yii::app()->clientScript->registerScript('getSelectedService', "
function getService(id){
	$('input[name=selectedService]').val($.fn.yiiGridView.getSelection(id));
}
");

Yii::app()->clientScript->registerScript('getSelectedEmployee', "
function getEmployee(id){
	$('input[name=assignedEmployees]').val($.fn.yiiGridView.getSelection(id));
}
");
?>

<h1>Create Activity</h1>

<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'dataProvider'=>$dataProvider,
		'employeeDataProvider'=>$employeeDataProvider,
	));
?>