<?php

/**
 * This is the model class for table "pax_service".
 *
 * The followings are the available columns in table 'pax_service':
 * @property integer $id
 * @property integer $pax_id
 * @property integer $service_id
 * @property string $notes
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Service $service
 * @property Pax $pax
 */
class PaxService extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaxService the static model class
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
		return 'pax_service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pax_id, service_id', 'required'),
			array('pax_id, service_id', 'numerical', 'integerOnly'=>true),
			array('notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pax_id, service_id, notes, createdon', 'safe', 'on'=>'search'),
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
			'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
			'pax' => array(self::BELONGS_TO, 'Pax', 'pax_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pax_id' => 'Pax',
			'service_id' => 'Service',
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
		$criteria->compare('pax_id',$this->pax_id);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}