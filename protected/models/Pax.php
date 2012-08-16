<?php

/**
 * This is the model class for table "pax".
 *
 * The followings are the available columns in table 'pax':
 * @property integer $id
 * @property integer $booking_id
 * @property string $name
 * @property integer $age
 * @property string $passport
 * @property string $height
 * @property string $weight
 * @property string $arrival_detail
 * @property string $arrival_time
 * @property string $departure_detail
 * @property string $departure_time
 * @property string $room
 * @property string $notes
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Booking $booking
 */
class Pax extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pax the static model class
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
		return 'pax';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id, name, createdon', 'required'),
			array('booking_id, age', 'numerical', 'integerOnly'=>true),
			array('name, passport, height, weight, arrival_detail, departure_detail, room', 'length', 'max'=>255),
			array('arrival_time, departure_time, notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, name, age, passport, height, weight, arrival_detail, arrival_time, departure_detail, departure_time, room, notes, createdon', 'safe', 'on'=>'search'),
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
			'booking' => array(self::BELONGS_TO, 'Booking', 'booking_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'booking_id' => 'Booking',
			'name' => 'Name',
			'age' => 'Age',
			'passport' => 'Passport',
			'height' => 'Height',
			'weight' => 'Weight',
			'arrival_detail' => 'Arrival Detail',
			'arrival_time' => 'Arrival Time',
			'departure_detail' => 'Departure Detail',
			'departure_time' => 'Departure Time',
			'room' => 'Room',
			'notes' => 'Notes',
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
		$criteria->compare('booking_id',$this->booking_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('arrival_detail',$this->arrival_detail,true);
		$criteria->compare('arrival_time',$this->arrival_time,true);
		$criteria->compare('departure_detail',$this->departure_detail,true);
		$criteria->compare('departure_time',$this->departure_time,true);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}