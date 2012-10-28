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
		<?php echo $form->label($model,'activity_type_id'); ?>
		<?php echo $form->dropDownList($model,'activity_type_id', 
				CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'--')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<?php /* public $startDate;
	public $endDate;
	public $employee_id;
	public $booking_code;
	public $filterByAssignmentToService=0;
	public $filterByAssignmentToEmployee=0;
	public $filterByCompleted=0; */ ?>

	<div class="row">
		<?php echo $form->label($model,'activity_date'); ?>
		<?php echo $form->dateField($model,'activity_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity_time'); ?>
		<?php echo $form->textField($model,'activity_time',array('rows'=>10, 'cols'=>20)); ?>
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