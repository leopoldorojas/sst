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

?>

<h1>Manage Services</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of 
each of your search values to specify how the comparison should be done.
</p>

<p>
<?php echo CHtml::link('Click here to search for specific Services','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchByBookingOrDate',array(
	'model'=>$model,
	'searchForm'=>$searchForm,
)); ?>
</div><!-- search-form -->
</P>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search($searchForm),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'booking_code',
            'value'=>'$data->booking_code',
            'filter' => CHtml::activeTextField($searchForm, 'bookingCode'),
            'sortable' => false,
        ),
        'seq',
        'day',
		'delivery_date',
		array('name'=>'description','sortable'=>false),
		'supplier',
		'voucher',
		'pickup',
		'pickuptime',
		// 'dropoff',
		// 'dropofftime',
		'pax_number',
		// 'service_type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>