<?php
/* @var $this BookingController */
/* @var $model Booking */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookingid')); ?>:</b>
	<?php echo CHtml::encode($data->bookingid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bhdid')); ?>:</b>
	<?php echo CHtml::encode($data->bhdid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('booking_code')); ?>:</b>
	<?php echo CHtml::encode($data->booking_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('traveldate')); ?>:</b>
	<?php echo CHtml::encode($data->traveldate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent')); ?>:</b>
	<?php echo CHtml::encode($data->agent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consultant')); ?>:</b>
	<?php echo CHtml::encode($data->consultant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priority')); ?>:</b>
	<?php echo CHtml::encode($data->priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />

</div>