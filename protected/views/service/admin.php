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
		// 'dropoff',
		// 'dropofftime',
		'pax_number',
		// 'service_type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>