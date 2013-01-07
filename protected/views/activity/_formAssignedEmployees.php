<!-- Use this paragraph to display the loading.gif icon above the ActivityService Gridview,
while waiting for the ajax response -->
<p id="loadingPic"></br></p>
<p><b>Employees already assigned to this Activity:</b></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedEmployee-grid',
	'dataProvider'=>$assignedEmployeesDataProvider,
	'columns'=>array(
		array('name'=>'Name', 'value'=>'$data->employee->fullName'),
		/* array(
	        'class'=>'CLinkColumn',
	        'urlExpression'=>'Yii::app()->controller->createUrl("employee/".$data->employee->id)',
	        'header'=>'Name',
	        'labelExpression'=>'$data->employee->fullName',
      	), */
		array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'deleteButtonLabel'=>'Unassign Employee',
            'deleteButtonUrl' => 'array("assignment/delete", "id"=>$data->id)',
        ),
	),
	'ajaxUpdate' => 'employee-grid',
	'summaryText' => 'Click X to unassign an employee. Employee will not be deleted, only unassigned',
)); ?>