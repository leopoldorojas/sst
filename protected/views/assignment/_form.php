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
		<?php echo $form->dropDownList($model,'employee_id',
			CHtml::listData(Employee::model()->getEnabledEmployees(), 'id', 'fullName'), array('empty'=>'Please, select an Employee'));
		?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_id'); ?>
		<?php echo $form->dropDownList($model,'activity_id',
			CHtml::listData(Activity::model()->getEnabledActivities(), 'id', 'description'), array('empty'=>'Please, select an Activity'));
		?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->