<?php
/* @var $this AssignmentController */
/* @var $model Assignment */

$this->breadcrumbs=array(
	'Assignments'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List Assignment', 'url'=>array('index')),
	array('label'=>'Create Assignment', 'url'=>array('create')),
	array('label'=>'Manage Assignments', 'url'=>array('admin')), // Instead of List
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('assignment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
    '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerScript('getDate', "
	var dates = $('#AssignmentFilterForm_activityDate' ).datepicker({
                dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '2008:2020',
       			onSelect: function( selectedDate ) {
            		// var option = this.id == 'AssignmentFilterForm_startDate' ? 'minDate' : 'maxDate',
            		var option = 'minDate',
                 	instance = $( this ).data( 'datepicker' ),
                 	date = $.datepicker.parseDate(
                    	instance.settings.dateFormat ||
                      	$.datepicker._defaults.dateFormat,
                      	selectedDate, instance.settings
                    );
            		dates.not( this ).datepicker( 'option', option, date);
       			}
    });
");

?>

<h1>Manage Assignments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'searchForm'=>$searchForm,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'assignment-grid',
	'dataProvider'=>$model->search($searchForm),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'header'=>'Activity Type',
			'value'=>'$data->activity->activityType->description',
			'filter' => CHtml::activeDropDownList($searchForm,'activityTypeId', 
				CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'--')),
		), 
		array(
			'header'=>'Employee',
			'value'=>'$data->employee->fullName',
			'filter' => CHtml::activeDropDownList($model,'employee_id', 
				CHtml::listData(Employee::model()->getEnabledEmployees(), 'id', 'fullName'), array('empty'=>'--')),
		),
		array(
			'header'=>'Activity Date',
			'value'=>'$data->activity->activity_date',
            'filter' => CHtml::activeTextField($searchForm, 'activityDate'),
		),
		array(
			'header'=>'Activity Time',
			'value'=>'$data->activity->activity_time',
            'filter' => CHtml::activeTextField($searchForm, 'activityTime'),
		),
		array(
			// 'name'=>'activity.description',
			'header'=>'Activity Description',
			'value'=>'$data->activity->description',
            'filter' => CHtml::activeTextField($searchForm, 'activityDescription'),
		),
		'estimated_hours',
		'actual_hours',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
