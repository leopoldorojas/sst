<?php
/* @var $this ServiceController */
/* @var $model Service */
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
		<?php echo $form->label($model,'booking_id'); ?>
		<?php echo $form->textField($model,'booking_id', array('size'=>5, 'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day'); ?>
		<?php echo $form->textField($model,'day', array('size'=>2, 'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seq'); ?>
		<?php echo $form->textField($model,'seq', array('size'=>2, 'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date', array('size'=>10, 'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pickup'); ?>
		<?php echo $form->textField($model,'pickup',array('size'=>50,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pickuptime'); ?>
		<?php echo $form->textField($model,'pickuptime', array('size'=>10, 'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'droppoff'); ?>
		<?php echo $form->textField($model,'droppoff',array('size'=>50,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dropofftime'); ?>
		<?php echo $form->textField($model,'dropofftime', array('size'=>10, 'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voucher'); ?>
		<?php echo $form->textField($model,'voucher',array('size'=>15,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supplier'); ?>
		<?php echo $form->textField($model,'supplier',array('size'=>50,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guide'); ?>
		<?php echo $form->textField($model,'guide',array('size'=>50,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pax_number'); ?>
		<?php echo $form->textField($model,'pax_number', array('size'=>2, 'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ops'); ?>
		<?php echo $form->checkBox($model,'ops'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sell'); ?>
		<?php echo $form->textField($model,'sell',array('size'=>8,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>8,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>5,'maxlength'=>10)); ?>
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