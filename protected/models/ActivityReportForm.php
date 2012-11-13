<?php

/**
 * ActivityReportForm class.
 * ActivityRerportForm is the data structure for keeping
 * Search form data for filter the Model Activity by all the attributes of the Report
 * It is used each time the Report Controller action needs to pass data to report forms.
 */
class ActivityReportForm extends CFormModel
{
	public $startDate;
	public $endDate;
	public $employee_id;
	public $booking_code;
	public $filterByAssignmentToService=0;
	public $filterByAssignmentToEmployee=0;
	public $filterByCompleted=0;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('startDate, endDate', 'date', 'format'=>'yyyy-MM-dd'),
			array('booking_code', 'length', 'max'=>30),
			array('employee_id, filterByAssignmentToService, filterByAssignmentToEmployee, filterByCompleted', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'startDate' => 'Start Date',
			'endDate' => 'End Date',
			'employee_id' => 'Employee',
			'booking_code'=> 'Booking Code',
			'filterByAssignmentToService' => 'Filter by Services',
			'filterByAssignmentToEmployee' => 'Filter by Employees',
			'filterByCompleted' => 'Filter by Completed',
		);
	}

}