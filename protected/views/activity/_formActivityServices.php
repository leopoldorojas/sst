<!-- <p><b>Services that you can assign for this Activity:</b></p> -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$dataProvider,
	'selectableRows'=>10,
	'columns'=>array(
		'id',
		array('name'=>'Booking Code', 'value'=>'$data->booking->booking_code'),
		'delivery_date',
		'description',
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