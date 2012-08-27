<?php

/**
 * This is the model class for table "booking".
 *
 * The followings are the available columns in table 'booking':
 * @property integer $id
 * @property string $bookingid
 * @property string $bhdid
 * @property string $booking_code
 * @property string $name
 * @property string $traveldate
 * @property string $agent
 * @property string $status
 * @property string $consultant
 * @property string $priority
 * @property string $notes
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Service[] $services
 * @property Pax[] $paxes
 */
class Booking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Booking the static model class
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
		return 'booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bookingid, bhdid, booking_code', 'required'),
			array('bookingid, bhdid, booking_code', 'unique'),
			array('bookingid, bhdid, booking_code', 'length', 'max'=>30),
			array('name, agent, consultant', 'length', 'max'=>50),
			array('status, priority', 'length', 'max'=>10),
			array('traveldate','date', 'format'=>'yyyy-MM-dd'),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bookingid, bhdid, booking_code, name, traveldate, agent, status, consultant, priority, notes, createdon', 'safe', 'on'=>'search'),
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
			'services' => array(self::HAS_MANY, 'Service', 'booking_id'),
			'paxes' => array(self::HAS_MANY, 'Pax', 'booking_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bookingid' => 'Operations Booking Id',
			'bhdid' => 'Tourplan Booking Id',
			'booking_code' => 'Booking Code',
			'name' => 'Booking Tourist Name',
			'traveldate' => 'Travel Date',
			'agent' => 'Agent',
			'status' => 'Status',
			'consultant' => 'Consultant',
			'priority' => 'Priority',
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
		$criteria->compare('bookingid',$this->bookingid,true);
		$criteria->compare('bhdid',$this->bhdid,true);
		$criteria->compare('booking_code',$this->booking_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('traveldate',$this->traveldate,true);
		$criteria->compare('agent',$this->agent,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('consultant',$this->consultant,true);
		$criteria->compare('priority',$this->priority,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}