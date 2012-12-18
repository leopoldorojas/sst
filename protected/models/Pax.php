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
 * @property string $departure_detail
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
			array('booking_id, name', 'required'),
			array('booking_id, age', 'numerical', 'integerOnly'=>true),
			array('booking_id','bookingExist'),
			array('arrival_detail, departure_detail', 'length', 'max'=>100),
			array('name, passport, height, weight', 'length', 'max'=>50),
			array('room', 'length', 'max'=>10),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, name, age, passport, arrival_detail, departure_detail, room, notes', 'safe', 'on'=>'search'),
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
			'services' => array(self::MANY_MANY, 'Service','pax_service(pax_id, service_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'booking_id' => 'Booking Id',
			'name' => 'Name',
			'age' => 'Age',
			'passport' => 'Passport',
			'height' => 'Height',
			'weight' => 'Weight',
			'arrival_detail' => 'Arrival Detail',
			'departure_detail' => 'Departure Detail',
			'room' => 'Room',
			'notes' => 'Notes',
			'createdon' => 'Created on',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($bookingCode=NULL)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('booking_id',$this->booking_id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('arrival_detail',$this->arrival_detail,true);
		$criteria->compare('departure_detail',$this->departure_detail,true);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('t.notes',$this->notes,true);
		$criteria->with='booking';
		$criteria->compare('booking.booking_code',$bookingCode, true);

 		/* Sort on related Model's columns */
        $sort = new CSort;
        $sort->attributes = array(
            'booking.booking_code' => array(
            'asc' => 'booking_code',
            'desc' => 'booking_code DESC',
            ), '*', /* Treat all other columns normally */
        );
        /* End: Sort on related Model's columns */

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}

	public function bookingExist($attribute)
    {
    	if (!Booking::model()->findByPk($this->$attribute))
    		$this->addError($attribute,'The booking does not exist');
    }

	public function behaviors()
	{
	    return array(
	        'LoggableBehavior'=>
	            'ext.auditTrail.behaviors.LoggableBehavior',
	    );
	}
    
}