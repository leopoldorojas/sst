<!-- <p><b>Services that you can assign for this Activity:</b></p> -->

<?php
	$pageSize=1000; // Very Large to No Break Js for select rows
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$service->searchForActivityCreation($params),
		//$selectableServices=Service::model()->selectableByActivities();
		// $sort = new CSort('Service', array('attributes'=>array('*')));
		//$dataProvider = new CActiveDataProvider('Service');
		//$dataProvider->setData($selectableServices);

	'selectableRows'=>10,
	'filter'=>$service,
	'columns'=>array(
		'id',
        array(
            'name'=>'booking.booking_code',
            'value'=>'$data->booking->booking_code',
            'filter' => CHtml::activeTextField($params, 'bookingCode'),
            'sortable' => true,
        ),
		'delivery_date',
		array('name'=>'description','sortable'=>false),
		'seq',
		'day',
	),
	'selectionChanged' => 'getService',
	'summaryText' => 'Choose service(s) to be assigned',
)); ?>

<div class="row">
	<?php echo CHtml::label('Services to assign in this Activity:','selectedService'); ?>
	<?php echo CHtml::TextField('selectedService',"", array('readonly'=>'readonly')); ?>
</div>