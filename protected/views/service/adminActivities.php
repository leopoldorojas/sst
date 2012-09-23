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
		data: $(this).serialize()
	});
	return false;
});
");

Yii::app()->clientScript->registerScript('updateActivityServiceGrid', "
	function getService(id){
		$.fn.yiiGridView.update('activityService-grid', {
			data: 'Service[id]=' + $.fn.yiiGridView.getSelection(id)
		});
	}
");

Yii::app()->clientScript->registerScript('createActivity', "
$('.createActivity-button').click(function(){
	$('.createActivity-form').toggle();
	return false;
});
");

?>

<h1>Manage Services</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Service Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:all">
<?php $this->renderPartial('_searchByBookingOrDate',array(
	'model'=>$model,
	'searchForm'=>$searchForm,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search($searchForm),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'booking_id',
		'day',
		'seq',
		'delivery_date',
		'pickup',
		'pickuptime',
		'voucher',
		'supplier',
		'guide',
		'pax_number',
		'sell',
		'service_type',
		'createdon',
		array(
			'class'=>'CButtonColumn',
		),
	),
	'ajaxUpdate' => 'activityService-grid',
	'selectionChanged' => 'getService',
)); ?>
 
<?php
    $this->renderPartial('_serviceActivities', array(
	   	'childModel' => $childModel,
       	'service_id' => $model->id,
       	'activityModel'=>$activityModel,
    ));
?>