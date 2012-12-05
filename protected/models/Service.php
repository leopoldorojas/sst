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
 * @property string $dropoff
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
			array('pickup, dropoff, supplier, guide', 'length', 'max'=>100),
			array('service_type', 'length', 'max'=>10),
			array('voucher', 'length', 'max'=>30),
			array('sell, cost', 'numerical'),
			array('delivery_date', 'date', 'format'=>'yyyy-MM-dd'),
			array('pickuptime, dropofftime', 'date', 'format'=>'H:mm'),
			array('ops', 'boolean'),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, day, delivery_date, description, pickup, pickuptime, dropoff, dropofftime,
				voucher, supplier, pax_number, service_type,', 'safe', 'on'=>'search'),
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
			'paxes' => array(self::MANY_MANY, 'Pax','pax_service(service_id, pax_id)'),
		);
	}

	public function scopes()
    {
		return array(
            'tolServices'=>array(
                'condition' => "supplier = 'TOL'",
            ),
        );
    }

    // This is another scope but parameterized scope
    public function servicesOnDate($sinceDate, $strictToday=false)
	{
    	$this->getDbCriteria()->mergeWith(array(
        	'condition' => "delivery_date " . (($strictToday) ? "=" : ">=" ) . "'$sinceDate'",
    	));
    	return $this;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'booking_id' => 'Booking Id',
			'day' => 'Day',
			'seq' => 'Sequence',
			'delivery_date' => 'Service Date',
			'description' => 'Description',
			'pickup' => 'Pick up',
			'pickuptime' => 'Pick up Time',
			'dropoff' => 'Drop off',
			'dropofftime' => 'Drop off Time',
			'voucher' => 'Voucher',
			'supplier' => 'Supplier',
			'guide' => 'Guide',
			'pax_number' => 'Number of persons',
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

		$criteria->compare('delivery_date','>='.$params->startDate);
		$criteria->compare('delivery_date','<='.$params->endDate);
		if ($params->filterTol) $criteria->compare('supplier','TOL',true);

		$criteria->compare('t.id',$this->id);
		$criteria->compare('day',$this->day);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pickup',$this->pickup,true);
		$criteria->compare('pickuptime',$this->pickuptime,true);
		$criteria->compare('dropoff',$this->dropoff,true);
		$criteria->compare('dropofftime',$this->dropofftime,true);
		$criteria->compare('voucher',$this->voucher,true);
		$criteria->compare('supplier',$this->supplier,true);
		$criteria->compare('pax_number',$this->pax_number);
		$criteria->compare('service_type',$this->service_type,true);
		if ($params->sortTol) $criteria->order='FIELD(supplier, "TOL") DESC';
		/* if ($params->sortTol) $criteria->order="CASE
           WHEN supplier LIKE 'TOL' THEN 1
           ELSE 2
         END"; */

		$criteria->with='booking';
		$criteria->compare('booking.booking_code',$params->bookingCode,true);

		if ($params->withActivitiesAssigned>0) {
			$criteria->with=array('activityServices','booking');
			$criteria->together=true;
			($params->withActivitiesAssigned==1) ? $criteria->addCondition('activityServices.id IS NULL') : $criteria->addCondition('activityServices.id IS NOT NULL');
		}

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
			'sort'=>$sort, /* Needed for sort */
		));
	}

    public function bookingExist($attribute)
    {
    	if (!Booking::model()->findByPk($this->$attribute))
    		$this->addError($attribute,'The booking does not exist');
    }

    public function selectableByActivities()
    {
    	$criteria=new CDbCriteria;
    	$criteria->compare('activityServices.id', '');
    	return self::model()->tolServices()->servicesOnDate(date("Ymd"),false)->with('activityServices','booking')->findAll('activityServices.id IS NULL');
    }

}