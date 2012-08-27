<?php
/* @var $this AssignmentController */
/* @var $model Assignment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'assignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_id'); ?>
		<?php echo $form->textField($model,'activity_id', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'activity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimated_hours'); ?>
		<?php echo $form->textField($model,'estimated_hours', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'estimated_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actual_hours'); ?>
		<?php echo $form->textField($model,'actual_hours', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'actual_hours'); ?>
	</div>

	<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon', array('size'=>10,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'createdon'); ?>
	</div> */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->