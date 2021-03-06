<?php
/* @var $this AuditTrailController */
/* @var $model AuditTrail */

$this->breadcrumbs=array(
	'Audit Trails'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AuditTrail', 'url'=>array('index')),
	// array('label'=>'Create AuditTrail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('audit-trail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Audit Trails</h1>

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
	'id'=>'audit-trail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'user.name',
			'filter' => CHtml::activeDropDownList($model,'user_id', 
				CHtml::listData(User::model()->findAll(), 'id', 'name'), array('empty'=>'--')),
		), 
		array('name'=>'old_value','sortable'=>false),
		array('name'=>'new_value','sortable'=>false),
		'action',
		'model',
		'field',
		'stamp',
		// 'model_id',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
		),
	),
)); ?>
