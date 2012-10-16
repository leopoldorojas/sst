<?php

/**
 * This is the model class for table "activity".
 *
 * The followings are the available columns in table 'activity':
 * @property integer $id
 * @property integer $activity_type_id
 * @property string $description
 * @property string $activity_date
 * @property string $activity_time
 * @property boolean $completed
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property ActivityType $activityType
 * @property Assignment[] $assignments
 * @property ActivityService[] $activityServices
 */
class Activity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Activity the static model class
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
		return 'activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activity_type_id', 'required'),
			array('activity_type_id', 'numerical', 'integerOnly'=>true),
			array('activity_type_id', 'activityTypeExist'),
			array('activity_date', 'date', 'format'=>'yyyy-MM-dd'),
			array('activity_time', 'date', 'format'=>'H:mm'),
			array('completed', 'boolean'),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, activity_type_id, description, activity_date, activity_time, completed, createdon', 'safe', 'on'=>'search'),
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
			'activityType' => array(self::BELONGS_TO, 'ActivityType', 'activity_type_id'),
			'assignments' => array(self::HAS_MANY, 'Assignment', 'activity_id'),
			'activityServices' => array(self::HAS_MANY, 'ActivityService', 'activity_id'),
			'services' => array(self::HAS_MANY, 'Service', array('service_id'=>'id'),'through'=>'activityServices'),
			'employees' => array(self::HAS_MANY, 'Employee', array('employee_id'=>'id'),'through'=>'assignments'),
		);
	}

    // This is a parameterized scope
    public function activitiesOnDate($sinceDate, $strictToday=false)
	{
    	$this->getDbCriteria()->mergeWith(array(
        	'condition' => 'activity_date ' . (($strictToday) ? '=' : '>=' ) . $sinceDate,
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
			'activity_type_id' => 'Activity Type',
			'description' => 'Description',
			'activity_date' => 'Activity Date',
			'activity_time' => 'Activity Time',
			'completed' => 'Completed?',
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
		$criteria->compare('activity_type_id',$this->activity_type_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('activity_date',$this->activity_date,true);
		$criteria->compare('activity_time',$this->activity_time,true);
		$criteria->compare('completed',$this->completed);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function activityTypeExist($attribute)
    {
    	if (!ActivityType::model()->findByPk($this->$attribute))
    		$this->addError($attribute,'The Activity Type does not exist');
    }

	public static function getEnabledActivities($activity_id=NULL, $inThisActivity=true)
	{
		if (!$activity_id) {
			return self::model()->activitiesOnDate(date("Ymd"),false)->findAllByAttributes(array('completed'=>false));
        	// return self::model()->findAllByAttributes(array('enabled'=>1));
        } else {
        	$assignments=Assignment::model()->findAllByAttributes(array('activity_id'=>$activity_id));
			
			$arrAssignments = array();
			foreach($assignments as $key => $assignment)
			{
    			$arrAssignments[$key] = $assignment->employee_id;
			}

			$criteria=new CDbCriteria;
			($inThisActivity) ? $criteria->addInCondition('id', $arrAssignments) : $criteria->addNotInCondition('id', $arrAssignments);
        	return self::model()->findAll($criteria);
        }
	}

}