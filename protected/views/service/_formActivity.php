<?php
/* @var $this ActivityController */
/* @var $model Activity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_type_id'); ?>
		<?php echo $form->dropDownList($model,'activity_type_id',
			CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'Please, select an Activity Type'));
		?>
		<?php echo $form->error($model,'activity_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_date'); ?>
		<?php echo $form->textField($model,'activity_date'); ?>
		<?php echo $form->error($model,'activity_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'activity_time'); ?>
		<?php echo CHtml::activeTextField($model,'activity_time', array('value'=>substr($model->activity_time,0,5))); ?>
		<?php echo $form->error($model,'activity_time'); ?>
	</div>

	<?php echo Chtml::hiddenField('service_id',$serviceModel->id); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->