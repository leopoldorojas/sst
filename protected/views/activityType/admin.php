<?php
/* @var $this ActivityTypeController */
/* @var $model ActivityType */

$this->breadcrumbs=array(
	'Activity Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	// array('label'=>'List ActivityType', 'url'=>array('index')),
	array('label'=>'Create Activity Type', 'url'=>array('create')),
	array('label'=>'Manage Activity Types', 'url'=>array('admin')),	// Instead List
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('activity-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Activity Types</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'filterByEnabled'=>$filterByEnabled,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'activity-type-grid',
	'dataProvider'=>$model->search($filterByEnabled),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'description',
		'service_types',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
