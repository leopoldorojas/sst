<?php

/**
 * This is the model class for table "vservice".
 *
 * The followings are the available columns in table 'vservice':
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
 * @property string $optlwdate
 * @property string $booking_code
 * @property integer $activityserviceid
 * @property integer $sort
 */
class Vservice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vservice the static model class
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
		return 'vservice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, booking_id, createdon, booking_code, sort', 'required'),
			array('id, booking_id, day, seq, pax_number, activityserviceid, sort', 'numerical', 'integerOnly'=>true),
			array('pickup, dropoff, voucher, supplier, guide, service_type, booking_code', 'length', 'max'=>255),
			array('sell, cost', 'length', 'max'=>19),
			array('delivery_date, description, pickuptime, dropofftime, ops, optlwdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, booking_id, day, seq, delivery_date, description, pickup, pickuptime, dropoff, dropofftime, voucher, supplier, guide, pax_number, ops, sell, cost, service_type, createdon, optlwdate, booking_code, activityserviceid, sort', 'safe', 'on'=>'search'),
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
			'seq' => 'Seq',
			'delivery_date' => 'Delivery Date',
			'description' => 'Description',
			'pickup' => 'Pickup',
			'pickuptime' => 'Pickuptime',
			'dropoff' => 'Dropoff',
			'dropofftime' => 'Dropofftime',
			'voucher' => 'Voucher',
			'supplier' => 'Supplier',
			'guide' => 'Guide',
			'pax_number' => 'Pax Number',
			'ops' => 'Ops',
			'sell' => 'Sell',
			'cost' => 'Cost',
			'service_type' => 'Service Type',
			'createdon' => 'Createdon',
			'optlwdate' => 'Optlwdate',
			'booking_code' => 'Booking Code',
			'activityserviceid' => 'Activityserviceid',
			'sort' => 'Sort',
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
		$criteria->compare('day',$this->day);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pickup',$this->pickup,true);
		$criteria->compare('pickuptime',$this->pickuptime,true);
		$criteria->compare('dropoff',$this->dropoff,true);
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
		$criteria->compare('optlwdate',$this->optlwdate,true);
		$criteria->compare('booking_code',$this->booking_code,true);
		$criteria->compare('activityserviceid',$this->activityserviceid);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}