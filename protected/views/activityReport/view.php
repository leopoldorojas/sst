<?php
/* @var $this ActivityReportController */
/* @var $model Activity */

Yii::app()->clientScript->registerScript('printActivity', "
$('.printActivity-button').click(function(){
	$.get('" . $this->createUrl('/activityReport/'. $model->id . '?p=1') . "');
	window.location.replace('" . $this->createUrl('/activityReport/'. $model->id . '?m=1') . "');
	return false;
});
");

?>

<?php if (!$printPartial) { ?>
		<p style="text-align:right"><?php echo CHtml::image(Yii::app()->theme->basePath . "/img/logo_tol.png"); ?></p>
		<h3 style="text-align:right">Special Services Tool</h3> 
		<p style="text-align:right">
			Report Date: <?php echo date("F d, Y"); ?><br />
			Reporte Time: <?php echo date("H:i"); ?><br />
		</p>
<?php } ?>

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
<?php $headerHtmlOptions = ($printPartial) ? array() : array('class'=>'printing'); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedEmployee-grid',
	'dataProvider'=>$assignedEmployeesDataProvider,
	'columns'=>array(
		array('header'=>'Employee Name', 'value'=>'$data->employee->fullName', 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Cost per hour', 'name'=>'employee.cost_per_hour', 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Estimated hours', 'name'=>'estimated_hours', 'sortable'=>false, 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Estimated cost', 'value'=>'$data->employee->cost_per_hour*$data->estimated_hours', 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Actual hours', 'name'=>'actual_hours', 'sortable'=>false, 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Actual cost', 'value'=>'$data->employee->cost_per_hour*$data->actual_hours', 'headerHtmlOptions'=>$headerHtmlOptions),
	),
));
?>

<h2>&nbsp;</h2>
<h2>Tourists assigned to this Activity</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tourist-grid',
	'dataProvider'=>$touristDataProvider,
	'columns'=>array(
		array('header'=>'Tourist Name', 'name'=>'name', 'sortable'=>false, 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Room', 'name'=>'room', 'sortable'=>false, 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Booking Code', 'name'=>'booking.booking_code', 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Booking Agent', 'name'=>'booking.agent', 'headerHtmlOptions'=>$headerHtmlOptions),
		array('header'=>'Booking Tourist Name', 'name'=>'booking.name', 'headerHtmlOptions'=>$headerHtmlOptions),
	),
)); 
?>

<?php if ($printPartial) { ?>
<div class="printActivity-form" style="display:all">
<?php echo CHtml::link('Click here to Print this Activity?','#', array('class'=>'printActivity-button')); ?>
</div>
<?php } ?>