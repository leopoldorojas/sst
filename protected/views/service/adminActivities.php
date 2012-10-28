<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Service', 'url'=>array('index')),
	array('label'=>'Create Service', 'url'=>array('create')),
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
	($.fn.yiiGridView.getKey(id, 0) > 0) ? $('.linkCreateActivity-form').hide() : $('.linkCreateActivity-form').show();
	$('.createActivity-form').hide();
}
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
       	'service_id' => $model->id,
       	'activityModel'=>$activityModel,
    ));
?>