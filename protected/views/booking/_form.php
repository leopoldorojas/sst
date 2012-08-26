<?php
/* @var $this BookingController */
/* @var $model Booking */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bookingid'); ?>
		<?php echo $form->textField($model,'bookingid',array('size'=>15,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'bookingid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bhdid'); ?>
		<?php echo $form->textField($model,'bhdid',array('size'=>15,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'bhdid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'booking_code'); ?>
		<?php echo $form->textField($model,'booking_code',array('size'=>15,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'booking_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'traveldate'); ?>
		<?php echo $form->dateField($model,'traveldate'); ?>
		<?php echo $form->error($model,'traveldate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent'); ?>
		<?php echo $form->textField($model,'agent',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'agent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'consultant'); ?>
		<?php echo $form->textField($model,'consultant',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'consultant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priority'); ?>
		<?php echo $form->textField($model,'priority',array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
		<?php echo $form->error($model,'createdon'); ?>
	</div> */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->