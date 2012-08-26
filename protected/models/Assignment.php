<?php

/**
 * This is the model class for table "assignment".
 *
 * The followings are the available columns in table 'assignment':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $activity_id
 * @property string $estimated_time
 * @property string $actual_time
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Activity $activity
 * @property Employee $employee
 */
class Assignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Assignment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, activity_id', 'required'),
			array('employee_id, activity_id', 'numerical', 'integerOnly'=>true),
			array('estimated_time, actual_time', 'date'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, activity_id, estimated_time, actual_time, createdon', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'activity' => array(self::BELONGS_TO, 'Activity', 'activity_id'),
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'employee_id' => 'Employee',
			'activity_id' => 'Activity',
			'estimated_time' => 'Estimated Time',
			'actual_time' => 'Actual Time',
			'createdon' => 'Createdon',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('estimated_time',$this->estimated_time,true);
		$criteria->compare('actual_time',$this->actual_time,true);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}