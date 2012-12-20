<?php
/* @var $this AuditTrailController */
/* @var $data AuditTrail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_value')); ?>:</b>
	<?php echo CHtml::encode($data->old_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_value')); ?>:</b>
	<?php echo CHtml::encode($data->new_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field')); ?>:</b>
	<?php echo CHtml::encode($data->field); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stamp')); ?>:</b>
	<?php echo CHtml::encode($data->stamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode(User::model()->findByPk($data->user_id)->name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('model_id')); ?>:</b>
	<?php echo CHtml::encode($data->model_id); ?>
	<br />

	*/ ?>

</div>