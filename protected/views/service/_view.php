<?php
/* @var $this ServiceController */
/* @var $model Service */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('booking_id')); ?>:</b>
	<?php echo CHtml::encode($data->booking_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day')); ?>:</b>
	<?php echo CHtml::encode($data->day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seq')); ?>:</b>
	<?php echo CHtml::encode($data->seq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_date')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pickup')); ?>:</b>
	<?php echo CHtml::encode($data->pickup); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pickuptime')); ?>:</b>
	<?php echo CHtml::encode($data->pickuptime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('droppoff')); ?>:</b>
	<?php echo CHtml::encode($data->droppoff); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dropofftime')); ?>:</b>
	<?php echo CHtml::encode($data->dropofftime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voucher')); ?>:</b>
	<?php echo CHtml::encode($data->voucher); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier')); ?>:</b>
	<?php echo CHtml::encode($data->supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guide')); ?>:</b>
	<?php echo CHtml::encode($data->guide); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pax_number')); ?>:</b>
	<?php echo CHtml::encode($data->pax_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ops')); ?>:</b>
	<?php echo CHtml::encode($data->ops); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sell')); ?>:</b>
	<?php echo CHtml::encode($data->sell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />

	*/ ?>

</div>