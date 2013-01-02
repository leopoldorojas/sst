<?php
/* @var $this ActivityController */
/* @var $model Activity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'activity-form',
	'enableAjaxValidation'=>false,
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
		<?php echo CHtml::label('Description of the Activity','description'); ?>
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

	<?php /* <div class="row">
		<?php echo CHtml::label('Do you want to display "Assignment of Services or Employees" forms?','updateForms'); ?>
		<?php echo CHtml::checkBox('displayForms', false , array('class'=>'displayForms-check')); ?>
	</div> */ ?>

	<hr />

	<div class="displayForms-form" style="display:all">
		<!-- <p>&nbsp;</p> -->
		<?php // echo CHtml::link('Assign Services?','#',array('class'=>'assignServices-button')); ?>
		<?php // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?> 
		<?php // echo CHtml::link('Assign Employees?','#',array('class'=>'assignEmployees-button')); ?>

		<div>
		<?php 
			$this->widget('zii.widgets.jui.CJuiButton',array(
			    'name'=>'buttonServices',
			    'caption'=>'Assign Services',
			    'value'=>'asd1',
			    'buttonType'=>'button',
			    'onclick'=>new CJavaScriptExpression('function(){
														$(".assignService-form").show();
														$(".assignEmployee-form").hide();
														return false;
													}'),
			));
		?>

		<?php 
			$this->widget('zii.widgets.jui.CJuiButton',array(
			    'name'=>'buttonEmployees',
			    'caption'=>'Assign Employees',
			    'value'=>'asd2',
			    'buttonType'=>'button',
			    'onclick'=>new CJavaScriptExpression('function(){
														$(".assignService-form").hide();
														$(".assignEmployee-form").show();
														return false;
													}'),
			));
		?>
		</div>

		<div class="assignService-form" style="display:all">
			<?php echo $this->renderPartial('_formActivityServices', array(
				'dataProvider'=>$dataProvider,
			));
			?>
		</div>

		<div class="assignEmployee-form" style="display:none">
			<?php echo $this->renderPartial('_formAssignments', array(
				'employeeDataProvider'=>$employeeDataProvider,
			));
			?>
		</div>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->