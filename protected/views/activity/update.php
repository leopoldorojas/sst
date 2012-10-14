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

Yii::app()->clientScript->registerScript('checkUpdateForms', "
$('.updateForms-check').change(function(){
	$('.updateForms-form').toggle();
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

<h1>Update Activity <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_formUpdate', array(
		'model'=>$model,
		'dataProvider'=>$dataProvider,
		'employeeDataProvider'=>$employeeDataProvider,
		'assignedServicesDataProvider'=>$assignedServicesDataProvider,
		'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
	));
?>