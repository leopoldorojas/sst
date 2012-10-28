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
?>

<h1>Report Activities</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
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
	'dataProvider'=>$model->search($searchForm->filterByCompleted),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'header'=>'Activity Type',
			'value'=>'$data->activityType->description',
			'filter' => CHtml::activeDropDownList($model,'activity_type_id', 
				CHtml::listData(ActivityType::model()->getEnabledActivityTypes(), 'id', 'description'), array('empty'=>'--')),
		),
		'description',
		'activity_date',
		'activity_time',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>