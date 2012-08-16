<?php
/* @var $this ActivityController */
/* @var $model Activity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_type_id'); ?>
		<?php echo $form->textField($model,'activity_type_id'); ?>
		<?php echo $form->error($model,'activity_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_datetime'); ?>
		<?php echo $form->textField($model,'activity_datetime'); ?>
		<?php echo $form->error($model,'activity_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'completed'); ?>
		<?php echo $form->checkBox($model,'completed'); ?>
		<?php echo $form->error($model,'completed'); ?>
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