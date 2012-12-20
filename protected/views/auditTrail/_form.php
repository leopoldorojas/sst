<?php
/* @var $this AuditTrailController */
/* @var $model AuditTrail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'audit-trail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::label('User Name', false); ?>
		<?php echo $form->dropDownList($model,'user_id', 
				CHtml::listData(User::model()->findAll(), 'id', 'name'), array('empty'=>'--')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'old_value'); ?>
		<?php echo $form->textArea($model,'old_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'old_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_value'); ?>
		<?php echo $form->textArea($model,'new_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'new_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field'); ?>
		<?php echo $form->textField($model,'field',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'field'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stamp'); ?>
		<?php echo $form->textField($model,'stamp'); ?>
		<?php echo $form->error($model,'stamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model_id'); ?>
		<?php echo $form->textField($model,'model_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'model_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->