<?php
/* @var $this ServiceController */
/* @var $model Service */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'booking_id'); ?>
		<?php echo $form->textField($model,'booking_id'); ?>
		<?php echo $form->error($model,'booking_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo $form->textField($model,'day'); ?>
		<?php echo $form->error($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seq'); ?>
		<?php echo $form->textField($model,'seq'); ?>
		<?php echo $form->error($model,'seq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
		<?php echo $form->error($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pickup'); ?>
		<?php echo $form->textField($model,'pickup',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pickup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pickuptime'); ?>
		<?php echo $form->textField($model,'pickuptime'); ?>
		<?php echo $form->error($model,'pickuptime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'droppoff'); ?>
		<?php echo $form->textField($model,'droppoff',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'droppoff'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dropofftime'); ?>
		<?php echo $form->textField($model,'dropofftime'); ?>
		<?php echo $form->error($model,'dropofftime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voucher'); ?>
		<?php echo $form->textField($model,'voucher',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'voucher'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier'); ?>
		<?php echo $form->textField($model,'supplier',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guide'); ?>
		<?php echo $form->textField($model,'guide',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'guide'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pax_number'); ?>
		<?php echo $form->textField($model,'pax_number'); ?>
		<?php echo $form->error($model,'pax_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ops'); ?>
		<?php echo $form->checkBox($model,'ops'); ?>
		<?php echo $form->error($model,'ops'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sell'); ?>
		<?php echo $form->textField($model,'sell',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'sell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
		<?php echo $form->error($model,'createdon'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->