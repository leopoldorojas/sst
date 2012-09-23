<?php

/**
 * DateRangeFilterForm class.
 * DateRangeFilterForm is the data structure for keeping
 * Search form data for filter the Model by Dates range
 * It is used each time a Controller action needs to pass Dates Range data to search forms.
 */
class DateRangeFilterForm extends CFormModel
{
	public $startDate;
	public $endDate;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('startDate, endDate', 'date', 'format'=>'yyyy-MM-dd'),
		);
	}

	/*
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 
	public function attributeLabels()
	{
		return array(
			'startDate'=>'Verification Code',
		);
	}
	*/
}