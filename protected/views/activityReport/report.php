<?php
/* @var $this ActivityReportController */
/* @var $model Activity */
/* @var $searchForm ActivityReportForm */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('activity-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('displayLinkReportAll', "
function getActivity(id){
	if ((selected_id = $.fn.yiiGridView.getKey(id,0)) > 0) {
		$('.linkReportAll-form').show();
	} else {
		$('.linkReportAll-form').hide();
	}
	return false;
}
");

Yii::app()->clientScript->registerScript('ReportAll', "
$('.reportAll-button').click(function(){
	data=$('.search-form form').serialize();
	$.get('/sst/index.php/activityReport/reportAll', data);
	window.location.replace('/sst/index.php/activityReport/report?m=1');
	return false;
});
");

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
    '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerScript('getDate', "
	var dates = $('#ActivityReportForm_startDate, #ActivityReportForm_endDate' ).datepicker({
                dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '2008:2020',
       			onSelect: function( selectedDate ) {
            		var option = this.id == 'ActivityReportForm_startDate' ? 'minDate' : 'maxDate',
            		// var option = 'minDate',
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

if($message) {
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'todoOkConReporteActividades',
		'options'=>array(
    		'title'=>'Reporte de Ejecución',
    		'autoOpen'=>true,
		),
	));

	echo $message;
	$this->endWidget('zii.widgets.jui.CJuiDialog');
}
?>

<h1>Report Activities</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:all">
<?php $this->renderPartial('_searchForReport',array(
	'model'=>$model,
	'searchForm'=>$searchForm,
)); ?>
</div><!-- search-form -->

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'activity-grid',
	'dataProvider'=>$model->searchForReport($searchForm),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'header'=>'Activity Type',
			'value'=>'$data->activityType->description',
			'filter' => CHtml::activeDropDownList($model,'activity_type_id', 
				CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'--')),
		),
		'activity_date',
		'activity_time',
		'description',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{print}',
			'buttons'=>array(
				'print'=>array(
					'label'=>'Print Activity',
					'url'=>'Yii::app()->createUrl("activityreport/$data->id", array("p"=>"1"))',
					'imageUrl'=>Yii::app()->baseUrl . '/images/print-for-yii.png',
				),
			),
		),
	),
	'afterAjaxUpdate' => 'getActivity',
)); ?>

<div class="linkReportAll-form" style="display:none">
<?php echo CHtml::link('Print a report of these Activities?','#', array('class'=>'reportAll-button')); ?>
</div>