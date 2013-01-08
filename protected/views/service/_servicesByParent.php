<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$dataProvider,
	'summaryText' => 'Services found:',
	'columns'=>array(
		'booking.booking_code',
        'seq',
        'day',
		'delivery_date',
		array('name'=>'description','sortable'=>false),
		'voucher',
		'pickuptime',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>