<?php
/* @var $this AssignmentController */
/* @var $model Assignment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity_id'); ?>
		<?php echo $form->textField($model,'activity_id', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estimated_hours'); ?>
		<?php echo $form->textField($model,'estimated_hours', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actual_hours'); ?>
		<?php echo $form->textField($model,'actual_hours', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon', array('size'=>10,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->