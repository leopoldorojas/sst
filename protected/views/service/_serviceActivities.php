<!-- Use this paragraph to display the loading.gif icon above the ActivityService Gridview,
while waiting for the ajax response -->
<p id="loadingPic"></br></p>

<h4>Activities linked to the above selected Service</h4>

<?php
    $params=array('service_id'=>$service_id,);
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'activityService-grid',
    'dataProvider'=>$childModel->search($params),
    'filter'=>$childModel,
    'columns'=>array(
        'activity.activity_type_id',
        'activity.description',
        'activity.activity_date',
        'activity.activity_time',
        'activity.completed',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'updateButtonUrl' => 'array("activity/update",
            "id"=>$data->activity_id)',
            'deleteButtonUrl' => 'array("activityService/delete",
            "id"=>$data->id)',
        ),
    ),
    ));

?>

<?php echo CHtml::link('Create new Activity for selected Service','#',array('class'=>'createActivity-button')); ?>
<div class="createActivity-form" style="display:none">
<?php $this->renderPartial('_formActivity',array(
    'model'=>$activityModel,
)); ?>
</div><!-- createActivity-form -->