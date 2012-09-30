<?php

/**
 * This is the model class for table "service".
 *
 * The followings are the available columns in table 'service':
 * @property integer $id
 * @property integer $booking_id
 * @property integer $day
 * @property integer $seq
 * @property string $delivery_date
 * @property string $description
 * @property string $pickup
 * @property string $pickuptime
 * @property string $droppoff
 * @property string $dropofftime
 * @property string $voucher
 * @property string $supplier
 * @property string $guide
 * @property integer $pax_number
 * @property boolean $ops
 * @property string $sell
 * @property string $cost
 * @property string $service_type
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Booking $booking
 * @property ActivityService[] $activityServices
 */
class Service extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Service the static model class
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
		return 'service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id', 'required'),
			array('booking_id, day, seq, pax_number', 'numerical', 'integerOnly'=>true),
			array('booking_id', 'bookingExist'),
			array('pickup, droppoff, supplier, guide', 'length', 'max'=>100),
			array('service_type', 'length', 'max'=>10),
			array('voucher', 'length', 'max'=>30),
			array('sell, cost', 'numerical'),
			array('delivery_date', 'date', 'format'=>'yyyy-MM-dd'),
			array('pickuptime, dropofftime', 'date', 'format'=>'H:mm'),
			array('ops', 'boolean'),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, day, seq, delivery_date, description, pickup, pickuptime, droppoff, dropofftime, voucher, supplier, guide, pax_number, ops, sell, cost, service_type, createdon', 'safe', 'on'=>'search'),
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
			'activityServices' => array(self::HAS_ONE, 'ActivityService', 'service_id'),
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
			'day' => 'Day',
			'seq' => 'Sequence',
			'delivery_date' => 'Delivery Date',
			'description' => 'Description',
			'pickup' => 'Pickup',
			'pickuptime' => 'Pickup Time',
			'droppoff' => 'Droppoff',
			'dropofftime' => 'Dropoff Time',
			'voucher' => 'Voucher',
			'supplier' => 'Supplier',
			'guide' => 'Guide',
			'pax_number' => 'Persons Number',
			'ops' => 'Operations Booking?',
			'sell' => 'Sell Price',
			'cost' => 'Operation Cost',
			'service_type' => 'Service Type',
			'createdon' => 'Created on',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($params=NULL)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		if(isset($params)) {
			$criteria->compare('delivery_date','>='.$params['startDate']);
			$criteria->compare('delivery_date','<='.$params['endDate']);
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('booking_id',$this->booking_id);
		$criteria->compare('day',$this->day);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pickup',$this->pickup,true);
		$criteria->compare('pickuptime',$this->pickuptime,true);
		$criteria->compare('droppoff',$this->droppoff,true);
		$criteria->compare('dropofftime',$this->dropofftime,true);
		$criteria->compare('voucher',$this->voucher,true);
		$criteria->compare('supplier',$this->supplier,true);
		$criteria->compare('guide',$this->guide,true);
		$criteria->compare('pax_number',$this->pax_number);
		$criteria->compare('ops',$this->ops);
		$criteria->compare('sell',$this->sell,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function bookingExist($attribute)
    {
    	if (!Booking::model()->findByPk($this->$attribute))
    		$this->addError($attribute,'The booking does not exist');
    }
}