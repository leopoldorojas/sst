<!-- Use this paragraph to display the loading.gif icon above the ActivityService Gridview,
while waiting for the ajax response -->
<p id="loadingPic"></br></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedEmployee-grid',
	'dataProvider'=>$assignedEmployeesDataProvider,
	'columns'=>array(
		array('name'=>'Name', 'value'=>'$data->employee->name . " " . $data->employee->lastname'),
		array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'deleteButtonUrl' => 'array("assignment/delete", "id"=>$data->id)',
        ),
	),
	'ajaxUpdate' => 'employee-grid',
)); ?>