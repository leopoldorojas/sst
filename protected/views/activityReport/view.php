<?php
/* @var $this ActivityController */
/* @var $model Activity */

Yii::app()->clientScript->registerScript('printActivity', "
$('.printActivity-button').click(function(){
	$.get('/sst/index.php/activityReport/$model->id?p=1');
	window.location.replace('/sst/index.php/activityReport/$model->id?m=1');
	return false;
});
");

?>

<h1>Report of Activity ID: <?php echo $model->id; ?></h1>
<?php
	if($message) {
		$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    		'id'=>'todoOkConReporteActividad',
    		'options'=>array(
        		'title'=>'Reporte de Ejecución',
        		'autoOpen'=>true,
    		),
		));

    	echo $message;
		$this->endWidget('zii.widgets.jui.CJuiDialog');
	}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array('name'=>'activityType.description', 'label'=>'Activity Type'),
		'description',
		'activity_date',
		'activity_time',
		array('label'=>'Completed?','value'=>($model->completed) ? 'Yes' : 'No' ),
	),
));
?>

<h2>&nbsp;</h2>
<h2>Assigned Employees to this Activity</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedEmployee-grid',
	'dataProvider'=>$assignedEmployeesDataProvider,
	'columns'=>array(
		array('header'=>'Employee Name', 'value'=>'$data->employee->fullName',),
		'employee.cost_per_hour',
		'estimated_hours',
		array('header'=>'Estimated cost', 'value'=>'$data->employee->cost_per_hour*$data->estimated_hours',),
		'actual_hours',
		array('header'=>'Actual cost', 'value'=>'$data->employee->cost_per_hour*$data->actual_hours',),
	),
));
?>

<h2>&nbsp;</h2>
<h2>Tourists assigned to this Activity</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tourist-grid',
	'dataProvider'=>$touristDataProvider,
	'columns'=>array(
		'name',
		'room',
		'booking.booking_code',
		'booking.agent',		
		'booking.name',
	),
)); 
?>

<div class="printActivity-form" style="display:all">
<?php echo CHtml::link('Click here to Print this Activity?','#', array('class'=>'printActivity-button')); ?>
</div>