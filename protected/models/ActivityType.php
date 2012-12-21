<?php

/**
 * This is the model class for table "activity_type".
 *
 * The followings are the available columns in table 'activity_type':
 * @property integer $id
 * @property string $description
 * @property boolean $enabled
 * @property string $service_types
 *
 * The followings are the available model relations:
 * @property Activity[] $activities
 */
class ActivityType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActivityType the static model class
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
		return 'activity_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('description', 'length', 'max'=>100),
			array('service_types', 'length', 'max'=>255),
			array('enabled', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, enabled, service_types', 'safe', 'on'=>'search'),
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
			'activities' => array(self::HAS_MANY, 'Activity', 'activity_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'enabled' => 'Enabled?',
			'service_types' => 'Allowed Service Types',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($filterByEnabled=0)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('service_types',$this->service_types,true);

		if ($filterByEnabled)
			($filterByEnabled==1) ? $criteria->compare('enabled',1) : $criteria->compare('enabled',0);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
    			'defaultOrder'=>'description',
  			),
		));
	}

	public static function getEnabledActivityTypes()
	{
        return self::model()->findAllByAttributes(array('enabled'=>1));
	}
	
	public function behaviors()
	{
	    return array(
	        'LoggableBehavior'=>
	            'ext.auditTrail.behaviors.LoggableBehavior',
	    );
	}

}