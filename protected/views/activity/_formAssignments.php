<div class="row">
	<?php echo CHtml::label('Assigned Employees','assignedEmployees'); ?>
	<?php echo CHtml::TextField('assignedEmployees',"", array('readonly'=>'readonly')); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$employeeDataProvider,
	'selectableRows'=>10,
	'columns'=>array(
		'id',
		'name',
		'lastname',
	),
	'selectionChanged' => 'getEmployee',
)); ?>