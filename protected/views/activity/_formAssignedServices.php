<!-- Use this paragraph to display the loading.gif icon above the ActivityService Gridview,
while waiting for the ajax response -->
<p id="loadingPic"></br></p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignedService-grid',
	'dataProvider'=>$assignedServicesDataProvider,
	'columns'=>array(
		array('name'=>'ID', 'value'=>'$data->service->id'),
		array('name'=>'Booking', 'value'=>'$data->service->booking_id'),
		array('name'=>'Day', 'value'=>'$data->service->day'),
		array('name'=>'Seq', 'value'=>'$data->service->seq'),
		array('name'=>'Supplier', 'value'=>'$data->service->supplier'),
		array('name'=>'Service Type', 'value'=>'$data->service->service_type'),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'deleteButtonUrl' => 'array("activityService/delete", "id"=>$data->id)',
        ),
	),
	'ajaxUpdate' => 'service-grid',
)); ?>