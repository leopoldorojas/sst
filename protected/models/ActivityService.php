<?php

/**
 * This is the model class for table "activity_service".
 *
 * The followings are the available columns in table 'activity_service':
 * @property integer $id
 * @property integer $activity_id
 * @property integer $service_id
 * @property string $room
 * @property string $notes
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Activity $activity
 * @property Service $service
 */
class ActivityService extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActivityService the static model class
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
		return 'activity_service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activity_id, service_id', 'required'),
			array('activity_id, service_id', 'numerical', 'integerOnly'=>true),
			array('room', 'length', 'max'=>10),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, activity_id, service_id, room, notes, createdon', 'safe', 'on'=>'search'),
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
			'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'activity_id' => 'Activity',
			'service_id' => 'Service',
			'room' => 'Room',
			'notes' => 'Notes',
			'createdon' => 'Created on',
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
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}