<?php
/* @var $this ActivityController */
/* @var $model Activity */
/* @var $form CActiveForm */
/* @var $searchForm ActivityReportForm */
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
		<?php echo $form->label($searchForm,'startDate'); ?>
		<?php echo $form->dateField($searchForm,'startDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'endDate'); ?>
		<?php echo $form->dateField($searchForm,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'booking_code'); ?>
		<?php echo $form->textField($searchForm,'booking_code', array('size'=>5, 'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'employee_id'); ?>
		<?php echo $form->dropDownList($searchForm,'employee_id', 
				CHtml::listData(Employee::model()->getEnabledEmployees(), 'id', 'fullName'), array('empty'=>'--')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity_type_id'); ?>
		<?php echo $form->dropDownList($model,'activity_type_id', 
				CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'--')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>3, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->radioButtonList($searchForm, 'filterByAssignmentToService', 
			array(
				'0'=>'All',
				'1'=>'Without Services',
				'2'=>'With Services',
			)
		); ?>
	</div>

	<div class="row">
		<?php echo $form->radioButtonList($searchForm, 'filterByAssignmentToEmployee', 
			array(
				'0'=>'All',
				'1'=>'Without Employees',
				'2'=>'With Employees',
			)
		); ?>
	</div>

	<div class="row">
		<?php echo $form->radioButtonList($searchForm, 'filterByCompleted', 
			array(
				'0'=>'All',
				'1'=>'Only uncompleted',
				'2'=>'Only completed',
			)
		); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->