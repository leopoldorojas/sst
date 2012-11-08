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
		<?php echo $form->dropDownList($model,'employee_id', 
				CHtml::listData(Employee::model()->getEnabledEmployees(), 'id', 'name'), array('empty'=>'--')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'activityDescription'); ?>
		<?php echo $form->textField($searchForm,'activityDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'activityDate'); ?>
		<?php echo $form->textField($searchForm,'activityDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'activityTime'); ?>
		<?php echo $form->textField($searchForm,'activityTime', array('value'=>substr($searchForm->activityTime,0,5))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estimated_hours'); ?>
		<?php echo $form->textField($model,'estimated_hours', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actual_hours'); ?>
		<?php echo $form->textField($model,'actual_hours', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->