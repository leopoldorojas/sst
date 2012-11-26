<?php
/* @var $this PaxServiceController */
/* @var $model PaxService */

$this->breadcrumbs=array(
	'Pax Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PaxService', 'url'=>array('index')),
	array('label'=>'Create PaxService', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pax-service-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pax Services</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pax-service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pax_id',
		'service_id',
		'notes',
		'createdon',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
