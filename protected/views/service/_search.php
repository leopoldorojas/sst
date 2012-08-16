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
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'booking_id'); ?>
		<?php echo $form->textField($model,'booking_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day'); ?>
		<?php echo $form->textField($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seq'); ?>
		<?php echo $form->textField($model,'seq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pickup'); ?>
		<?php echo $form->textField($model,'pickup',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pickuptime'); ?>
		<?php echo $form->textField($model,'pickuptime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'droppoff'); ?>
		<?php echo $form->textField($model,'droppoff',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dropofftime'); ?>
		<?php echo $form->textField($model,'dropofftime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voucher'); ?>
		<?php echo $form->textField($model,'voucher',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supplier'); ?>
		<?php echo $form->textField($model,'supplier',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guide'); ?>
		<?php echo $form->textField($model,'guide',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pax_number'); ?>
		<?php echo $form->textField($model,'pax_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ops'); ?>
		<?php echo $form->checkBox($model,'ops'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sell'); ?>
		<?php echo $form->textField($model,'sell',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdon'); ?>
		<?php echo $form->textField($model,'createdon'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->