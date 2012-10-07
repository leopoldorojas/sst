<?php // echo CHtml::link('Activities linked to the above selected Service','#',array('class'=>'activityService-button')); ?>
<div class="activityService-form" style="display:none">

<!-- Use this paragraph to display the loading.gif icon above the ActivityService Gridview,
while waiting for the ajax response -->
<p id="loadingPic"></br></p>

<?php
    $params=array('service_id'=>$service_id,);
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'activityService-grid',
    'dataProvider'=>$childModel->search($params),
    // 'filter'=>$childModel,
    'columns'=>array(
        'activity.activity_type_id',
        'activity.description',
        'activity.activity_date',
        'activity.activity_time',
        'activity.completed',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'updateButtonUrl' => 'array("activity/update", "id"=>$data->activity_id)',
            'deleteButtonUrl' => 'array("activityService/delete", "id"=>$data->id)',
            'afterDelete' => 'function(link,success,data){
                dataprocessed = $.parseJSON(data);
                if(success && dataprocessed.lastActivity) alert("Warning: You have deleted the last Service linked to the Activity " + dataprocessed.activityId);
            }',
        ),
    ),
    'afterAjaxUpdate' => 'manageCreateActivity',
    'showTableOnEmpty' => false,
    'emptyText' => 'The service does not have any activity assigned yet',  
    ));
?>
</div>

<div class="linkCreateActivity-form" style="display:none">
<?php echo CHtml::link('Create Activity for selected Service?','#',array('class'=>'createActivity-button')); ?>
</div>

<div class="createActivity-form" style="display:none">
<?php $this->renderPartial('_formActivity',array(
    'model'=>$activityModel,
    'service_id'=>$service_id,
)); ?>
</div><!-- createActivity-form -->