<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'activity-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'header'=>'Activity Type',
			'value'=>'$data->activityType->description',
		),
		'activity_date',
		'activity_time',
		array('name'=>'description','sortable'=>false),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>