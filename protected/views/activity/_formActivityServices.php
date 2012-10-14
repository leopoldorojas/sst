<div class="row">
	<?php echo CHtml::label('Selected services','selectedService'); ?>
	<?php echo CHtml::TextField('selectedService',"", array('readonly'=>'readonly')); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$dataProvider,
	'selectableRows'=>5,
	'columns'=>array(
		'id',
		'booking_id',
		// 'booking.name',
		'day',
		'seq',
		'service_type',
	),
	'selectionChanged' => 'getService',
)); ?>