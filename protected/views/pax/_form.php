<?php
/* @var $this PaxController */
/* @var $model Pax */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pax-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'booking_id'); ?>
		<?php echo $form->textField($model,'booking_id', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'booking_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age', array('size'=>2,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport'); ?>
		<?php echo $form->textField($model,'passport',array('size'=>12,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'passport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arrival_detail'); ?>
		<?php echo $form->textField($model,'arrival_detail',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'arrival_detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arrival_time'); ?>
		<?php echo $form->textField($model,'arrival_time', array('size'=>10,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'arrival_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departure_detail'); ?>
		<?php echo $form->textField($model,'departure_detail',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'departure_detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departure_time'); ?>
		<?php echo $form->textField($model,'departure_time', array('size'=>10,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'departure_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room'); ?>
		<?php echo $form->textField($model,'room',array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'room'); ?>
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