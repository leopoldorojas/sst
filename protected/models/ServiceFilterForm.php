<?php

/**
 * ServiceFilterForm class.
 * ServiceFilterForm is the data structure for keeping
 * Search form data for filter the Model by Dates range and other attributes
 * It is used each time a Controller action needs to pass Dates Range and other data to search forms.
 */
class ServiceFilterForm extends CFormModel
{
	public $startDate;
	public $endDate;
	public $filterTol;
	public $sortTol;
	public $bookingCode;
	public $withActivitiesAssigned;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('startDate, endDate', 'date', 'format'=>'yyyy-MM-dd'),
			array('filterTol, sortTol, bookingCode, withActivitiesAssigned', 'safe'),
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
			'filterTol' => 'Filter by TOL?',
			'sortTol' => 'Sort by TOL?',
			'bookingCode' => 'Booking Code',
			'withActivitiesAssigned'=>'Filter by Activities',
		);
	}

}