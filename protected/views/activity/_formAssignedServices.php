<!-- Use this paragraph to display the loading.gif icon above the AssignedService Gridview,
while waiting for the ajax response -->
<p id="loadingPic"></br></p>
<p><b>Assigned Services for this Activity:</b></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedService-grid',
	'dataProvider'=>$assignedServicesDataProvider,
	'columns'=>array(
		array('name'=>'Booking Code', 'value'=>'$data->booking()->booking_code'),
		array('name'=>'Date', 'value'=>'$data->service->delivery_date'),
		array('name'=>'Description', 'value'=>'$data->service->description'),
		array('name'=>'Sequence', 'value'=>'$data->service->seq'),
		array('name'=>'Day', 'value'=>'$data->service->day'),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'deleteButtonLabel'=>'Unassign Service',
            'deleteButtonUrl' => 'array("activityService/delete", "id"=>$data->id)',
        ),
	),
	'ajaxUpdate' => 'service-grid',
)); ?>