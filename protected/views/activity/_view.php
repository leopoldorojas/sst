<?php
/* @var $this ActivityController */
/* @var $model Activity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->activity_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity_date')); ?>:</b>
	<?php echo CHtml::encode($data->activity_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity_time')); ?>:</b>
	<?php echo CHtml::encode(substr($data->activity_time,0,5)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed')); ?>:</b>
	<?php echo CHtml::encode($data->completed); ?>
	<br />

</div>