<?php

/**
 * AssignmentFilterForm class.
 * AssignmentFilterForm is the data structure for keeping
 * Search form data for filter the Model by Activity Description, Activity Date or Activity Time
 * It is used each time a Controller action needs to pass Activity information and other data to search forms.
 */
class AssignmentFilterForm extends CFormModel
{
	public $activityDescription;
	public $activityDate;
	public $activityTime;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('activityDate', 'date', 'format'=>'yyyy-MM-dd'),
			array('activityTime', 'date', 'format'=>'H:mm'),
			array('activityDescription', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'activityDescription' => 'Activity Description',
			'activityDate' => 'Activity Date',
			'activityTime' => 'Activity Time',
		);
	}

}