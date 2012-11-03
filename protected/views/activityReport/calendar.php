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
	data=$('.search-form form').serialize();
	$.get('/sst/index.php/activityReport/calendar', data);
	//return false;
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
	window.location.replace('/sst/index.php/activityReport/calendar?m=1');
	return false;
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

<h1>Calendar of Activities</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:all">
<?php $this->renderPartial('_searchForReport',array(
	'model'=>$model,
	'searchForm'=>$searchForm,
)); ?>
</div><!-- search-form -->

<?php
$items[]=array(
        'title'=>'Meeting',
        'start'=>'2012-11-23',
        'color'=>'#CC0000',
        'allDay'=>true,
        'url'=>'http://anyurl.com'
    );
    $items[]=array(
        'title'=>'Meeting reminder',
        'start'=>'2012-11-19',
        'end'=>'2012-11-22',
 
        // can pass unix timestamp too
        // 'start'=>time()
 
        'color'=>'blue',
    );

    /* if (count($calendarData)>0) {
    	echo var_dump($calendarData);
    	Yii::app()->end();
    } */
?>

<?php $this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    // 'lang'=>'pl',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
 
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    // 'themeCssFile'=>'cupertino/theme.css',
 
    // raw html tags
    'htmlOptions'=>array(
        // you can scale it down as well, try 80%
        'style'=>'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options'=>array(
        'header'=>array(
            'left'=>'prev,next',
            'center'=>'title',
            'right'=>'today'
        ),
        'lazyFetching'=>true,
        // 'events'=>$calendarEventsUrl, // action URL for dynamic events, or
        'events'=>$calendarData, // pass array of events directly
 
        // event handling
        // mouseover for example
        // 'eventMouseover'=>new CJavaScriptExpression("js_function_callback"),
    )
));
?>

<div class="linkReportAll-form" style="display:all">
<?php echo CHtml::link('Print a report of selected Activities?','#', array('class'=>'reportAll-button')); ?>
</div>