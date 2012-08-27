<?php
/* @var $this AssignmentController */
/* @var $model Assignment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity_id')); ?>:</b>
	<?php echo CHtml::encode($data->activity_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimated_hours')); ?>:</b>
	<?php echo CHtml::encode($data->estimated_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_hours')); ?>:</b>
	<?php echo CHtml::encode($data->actual_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdon')); ?>:</b>
	<?php echo CHtml::encode($data->createdon); ?>
	<br />


</div>