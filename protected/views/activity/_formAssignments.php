<p><b>Employees that you can assign for this Activity:</b></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$employeeDataProvider,
	'selectableRows'=>10,
	'columns'=>array(
		'id',
		array('name'=>'Name', 'value'=>'$data->name . " " . $data->lastname'),
	),
	'selectionChanged' => 'getEmployee',
)); ?>

<div class="row">
	<?php echo CHtml::label('Employees to assign in this Activity:','assignedEmployees'); ?>
	<?php echo CHtml::TextField('assignedEmployees',"", array('readonly'=>'readonly')); ?>
</div>