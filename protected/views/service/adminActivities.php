<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List Service', 'url'=>array('index')),
	array('label'=>'Create Service', 'url'=>array('create')),
	array('label'=>'Manage Services', 'url'=>array('admin')), // Instead List Services
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('service-grid', {
		data: $(this).serialize(),
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('updateActivityServiceGrid', "
function getService(id){
	if ((selected_id = $.fn.yiiGridView.getSelection(id)) > 0) {
		$('.activityService-form').show();
		$.fn.yiiGridView.update('activityService-grid', { 
			data: 'Service[id]=' + selected_id
		});
	} else {
		$('.activityService-form').hide();
	}
	return false;
}
");

Yii::app()->clientScript->registerScript('createActivity', "
$('.createActivity-button').click(function(){
	$('.createActivity-form').toggle();
	return false;
});

$('.createActivity-form form').submit(function(){
	data=$(this).serialize() + $.fn.yiiGridView.getSelection('service-grid');
	$.get(window.location, data,
		function resultOnCreateActivity(data) {
			alert(data);
		}
	);

	$(this).get(0).reset();

	$.fn.yiiGridView.update('activityService-grid', {
		data: 'Service[id]=' + $.fn.yiiGridView.getSelection('service-grid')
	});

	return false;
});
");

Yii::app()->clientScript->registerScript('hideActivities', "
function hideActivities(){
	$('.activityService-form').hide();
}
");

Yii::app()->clientScript->registerScript('manageCreateActivity', "
function manageCreateActivity(id, data){

	if (!($.fn.yiiGridView.getKey(id, 0)>0)) {
        var keys = $('#service-grid > div.keys > span');

        $('#service-grid > table > tbody > tr').each(function(i)
        {
            if($(this).hasClass('selected'))
            {
            	$('input[id=Activity_activity_date]').val($(this).children(':nth-child(5)').text()); /* 5 because delivery_date is fifth column */
            }
        });

		$('.linkCreateActivity-form').show()
	} else {
		$('.linkCreateActivity-form').hide()
	}

	$('.createActivity-form').hide();
}
");

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
    '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerScript('getDate', "
	var dates = $('#ServiceFilterForm_startDate, #ServiceFilterForm_endDate' ).datepicker({
                dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '2008:2020',
       			onSelect: function( selectedDate ) {
            		var option = this.id == 'ServiceFilterForm_startDate' ? 'minDate' : 'maxDate',
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

Yii::app()->clientScript->registerScript('getAnotherDate', "
	var dates2 = $('#Activity_activity_date' ).datepicker({
                dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true,yearRange: '2008:2020',
       			onSelect: function( selectedDate ) {
            		// var option = this.id == 'ServiceFilterForm_startDate' ? 'minDate' : 'maxDate',
            		var option = 'minDate',
                 	instance = $( this ).data( 'datepicker' ),
                 	date = $.datepicker.parseDate(
                    	instance.settings.dateFormat ||
                      	$.datepicker._defaults.dateFormat,
                      	selectedDate, instance.settings
                    );
            		dates2.not( this ).datepicker( 'option', option, date);
       			}
    });
");

?>

<h1>Manage Activities by Service</h1>

<p>Here you can manage (create or unlink) Activities by selecting the Service to which the Activity belongs</p>

<p>
<?php echo CHtml::link('Use this form to search for specific Services','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:all">
<?php $this->renderPartial('_searchByBookingOrDate',array(
	'model'=>$model,
	'searchForm'=>$searchForm,
)); ?>
</div><!-- search-form -->
</P>

<p>
Please, select the Service, clicking in the corresponding row. To filter Services, you may optionally enter a comparison operator 
(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of 
each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search($searchForm),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'booking.booking_code',
            'value'=>'$data->booking->booking_code',
            'filter' => CHtml::activeTextField($searchForm, 'bookingCode'),
        ),
        'seq',
        'day',
		'delivery_date',
		'description',
		'supplier',
		'voucher',
		'pickup',
		'pickuptime',
		'dropoff',
		'dropofftime',
		'pax_number',
		'service_type',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl' => 'array("service/view", "id"=>$data->id)',
		),
	),
	'afterAjaxUpdate' => 'hideActivities',
	'selectionChanged' => 'getService',
)); ?>
 
<?php
    $this->renderPartial('_serviceActivities', array(
	   	'childModel' => $childModel,
       	'serviceModel' => $model,
       	'activityModel'=>$activityModel,
    ));
?>