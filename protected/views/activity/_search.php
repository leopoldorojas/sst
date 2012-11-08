<?php
/* @var $this ActivityController */
/* @var $model Activity */
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
		<?php echo $form->label($model,'activity_type_id'); ?>
		<?php echo $form->dropDownList($model,'activity_type_id', 
				CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'--')); ?>
		<?php // echo $form->textField($model,'activity_type_id', array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity_date'); ?>
		<?php echo $form->textField($model,'activity_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity_time'); ?>
		<?php echo $form->textField($model,'activity_time',array('rows'=>10, 'cols'=>20)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::radioButtonList('filterByCompleted', $filterByCompleted, 
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