<?php
/* @var $this ActivityServiceController */
/* @var $model ActivityService */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-service-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_id'); ?>
		<?php echo $form->textField($model,'activity_id', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'activity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<?php echo $form->textField($model,'service_id', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'service_id'); ?>
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
		<?php echo $form->textField($model,'createdon', array('size'=>10,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'createdon'); ?>
	</div> */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->