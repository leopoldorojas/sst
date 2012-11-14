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

<?php if (!$printPartial) { ?>
		<p style="text-align:right"><?php echo CHtml::image(Yii::app()->theme->basePath . "/img/logo_tol.png"); ?></p>
		<p style="text-align:right">
			Fecha del Reporte: <?php echo date("F d, Y"); ?><br />
			Hora del Reporte: <?php echo date("H:i"); ?><br />
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedEmployee-grid',
	'dataProvider'=>$assignedEmployeesDataProvider,
	'columns'=>array(
		array('header'=>CHtml::link('Employee Name','#'), 'value'=>'$data->employee->fullName', 'headerHtmlOptions'=>array('class'=>'bgnone')),
		array('header'=>CHtml::link('Cost per hour','#'), 'name'=>'employee.cost_per_hour'),
		array('header'=>CHtml::link('Estimated hours','#'), 'name'=>'estimated_hours', 'sortable'=>false),
		array('header'=>CHtml::link('Estimated cost','#'), 'value'=>'$data->employee->cost_per_hour*$data->estimated_hours'),
		array('header'=>CHtml::link('Actual hours','#'), 'name'=>'actual_hours', 'sortable'=>false),
		array('header'=>CHtml::link('Actual cost','#'), 'value'=>'$data->employee->cost_per_hour*$data->actual_hours'),
	),
));
?>

<h2>&nbsp;</h2>
<h2>Tourists assigned to this Activity</h2>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tourist-grid',
	'dataProvider'=>$touristDataProvider,
	'columns'=>array(
		array('header'=>CHtml::link('Tourist Name','#'), 'name'=>'name', 'sortable'=>false),
		array('header'=>CHtml::link('Room','#'), 'name'=>'room', 'sortable'=>false),
		array('header'=>CHtml::link('Booking Code','#'), 'name'=>'booking.booking_code', 'sortable'=>false),
		array('header'=>CHtml::link('Booking Agent','#'), 'name'=>'booking.agent', 'sortable'=>false),
		array('header'=>CHtml::link('Booking Tourist Name','#'), 'name'=>'booking.name', 'sortable'=>false),
	),
)); 
?>

<?php if ($printPartial) { ?>
<div class="printActivity-form" style="display:all">
<?php echo CHtml::link('Click here to Print this Activity?','#', array('class'=>'printActivity-button')); ?>
</div>
<?php } ?>