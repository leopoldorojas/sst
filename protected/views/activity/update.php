<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Activity', 'url'=>array('index')),
	array('label'=>'Create Activity', 'url'=>array('create')),
	array('label'=>'View Activity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Activities', 'url'=>array('admin')),
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

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
    '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerScript('getDate', "
	var dates = $('#Activity_activity_date' ).datepicker({
                dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '2008:2020',
       			onSelect: function( selectedDate ) {
            		// var option = this.id == 'seafrom' ? 'minDate' : 'maxDate',
            		var option = 'minDate',
                 	instance = $( this ).data( 'datepicker' ),
                 	date = $.datepicker.parseDate(
                    	instance.settings.dateFormat ||
                      	$.datepicker._defaults.dateFormat,
                      	selectedDate, instance.settings
                    );
            		dates.not( this ).datepicker( 'option', option, date);
       			}
    });
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