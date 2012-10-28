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
		<?php echo $form->label($searchForm,'bookingCode'); ?>
		<?php echo $form->textField($searchForm,'bookingCode', array('size'=>5, 'maxlength'=>10)); ?>
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
		<?php echo $form->label($searchForm,'filterTol'); ?>
		<?php echo $form->checkBox($searchForm,'filterTol'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($searchForm,'sortTol'); ?>
		<?php echo $form->checkBox($searchForm,'sortTol'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->