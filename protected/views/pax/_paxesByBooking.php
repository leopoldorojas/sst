<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pax-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
        'name',
		'age',
		'passport',
		'arrival_detail',
		'departure_detail',
		'room',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>