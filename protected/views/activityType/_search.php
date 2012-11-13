<?php
/* @var $this ActivityTypeController */
/* @var $model ActivityType */
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
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>50,'maxlength'=>100)); ?>
	</div>

	<div class="row-button compactRadioGroup">
		<?php echo $form->label($model,'filterByEnabled', array('class'=>'labelRadio')); ?>
		<?php echo CHtml::radioButtonList('filterByEnabled', $filterByEnabled, 
			array(
				'0'=>'All Activity Types',
				'1'=>'Only enabled',
				'2'=>'Only disabled',
			),
			array(
				'separator'=>''
			)
		); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_types'); ?>
		<?php echo $form->textField($model,'service_types',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->