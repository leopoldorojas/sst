<?php
/* @var $this BookingController */
/* @var $model Booking */
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
		<?php echo $form->label($model,'bookingid'); ?>
		<?php echo $form->textField($model,'bookingid',array('size'=>15,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bhdid'); ?>
		<?php echo $form->textField($model,'bhdid',array('size'=>15,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'booking_code'); ?>
		<?php echo $form->textField($model,'booking_code',array('size'=>15,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'traveldate'); ?>
		<?php echo $form->textField($model,'traveldate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent'); ?>
		<?php echo $form->textField($model,'agent',array('size'=>30,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'consultant'); ?>
		<?php echo $form->textField($model,'consultant',array('size'=>30,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'priority'); ?>
		<?php echo $form->textField($model,'priority',array('size'=>5,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon', array('size'=>10, 'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->