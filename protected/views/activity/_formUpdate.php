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
		<?php echo $form->dropDownList($model,'activity_type_id', CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description')); ?>
		<?php echo $form->error($model,'activity_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activity_date'); ?>
		<?php echo $form->dateField($model,'activity_date'); ?>
		<?php echo $form->error($model,'activity_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'activity_time'); ?>
		<?php echo CHtml::activeTextField($model,'activity_time', array('value'=>substr($model->activity_time,0,5))); ?>
		<?php echo $form->error($model,'activity_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'completed'); ?>
		<?php echo $form->checkBox($model,'completed'); ?>
		<?php echo $form->error($model,'completed'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Update Services and Employees?','updateForms'); ?>
		<?php echo CHtml::checkBox('updateForms', false , array('class'=>'updateForms-check')); ?>
	</div>

	<div class="updateForms-form" style="display:none">
		<?php echo CHtml::link('Assign Services?','#',array('class'=>'assignServices-button')); ?>
		<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?> 
		<?php echo CHtml::link('Assign Employees?','#',array('class'=>'assignEmployees-button')); ?>

		<div class="assignService-form" style="display:all">

			<?php echo $this->renderPartial('_formAssignedServices', array(
				'assignedServicesDataProvider'=>$assignedServicesDataProvider,
			));
			?>

			<?php echo $this->renderPartial('_formActivityServices', array(
				'dataProvider'=>$dataProvider,
			));
			?>
		</div>

		<div class="assignEmployee-form" style="display:none">

			<?php echo $this->renderPartial('_formAssignedEmployees', array(
				'assignedEmployeesDataProvider'=>$assignedEmployeesDataProvider,
			));
			?>

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