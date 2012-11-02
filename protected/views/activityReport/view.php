<?php
/* @var $this ActivityController */
/* @var $model Activity */
?>

<h1>Report of Activity ID: <?php echo $model->id; ?></h1>

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
		array('name'=>'Name', 'value'=>'$data->employee->fullName'),
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
		'booking.name',
	),
)); 
?>