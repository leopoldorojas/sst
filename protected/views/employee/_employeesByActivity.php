<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'name',
		'lastname',
		'identification_number',
		'rol',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
