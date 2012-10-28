<?php
/* @var $this PaxController */
/* @var $model Pax */

$this->breadcrumbs=array(
	'Paxes'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List Pax', 'url'=>array('index')),
	array('label'=>'Create Pax', 'url'=>array('create')),
	array('label'=>'Manage Pax', 'url'=>array('admin')),	// Instead of List
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pax-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Paxes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'bookingCode'=>$bookingCode,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pax-grid',
	'dataProvider'=>$model->search($bookingCode),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'booking.booking_code',
            'filter' => CHtml::textField('bookingCode', $bookingCode),
        ),
        'name',
		'age',
		'passport',
		'arrival_detail',
		'departure_detail',
		'room',
		'notes',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
