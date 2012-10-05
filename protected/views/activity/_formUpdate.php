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
		<?php echo $form->labelEx($assignment,'employee_id'); ?>
		<?php echo $form->dropDownList($assignment,'employee_id', CHtml::listData(Employee::model()->getEnabledEmployees(), 'id', 'name'), array(
			'empty' => 'Select the employee to assign',
		)); ?>
		<?php echo $form->error($assignment,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($assignment,'estimated_hours'); ?>
		<?php echo $form->textField($assignment,'estimated_hours', array('size'=>5,'maxlength'=>10)); ?>
		<?php echo $form->error($assignment,'estimated_hours'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Assign to a Service at this moment?','assignNow'); ?>
		<?php echo CHtml::checkBox('assignNow', false, array('class'=>'assignNow-check')); ?>
	</div>

	<div class="assignService-form" style="display:all">

		<div class="row">
			<?php echo CHtml::label('Servicio seleccionado','selectedService'); ?>
			<?php echo CHtml::TextField('selectedService',"", array('readonly'=>'readonly')); ?>
		</div>

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'service-grid',
			'dataProvider'=>$dataProvider,
			'columns'=>array(
				'id',
				'booking_id',
				'booking.name',
				'day',
				'seq',
				'service_type',
				/* array(    - Si la pongo lanza el trigger de borrado de las Actividades cuando es la ultima y entonces hay error
            		'class'=>'CButtonColumn',
            		'template'=>'{delete}',
		            'deleteButtonUrl' => 'array("activityService/delete", "id"=>$data->activityServices->id)',
				), */
			),
		)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->