<?php

/**
 * This is the model class for table "assignment".
 *
 * The followings are the available columns in table 'assignment':
 * @property integer $id
 * @property integer $employee_id
 * @property integer $activity_id
 * @property string $estimated_hours
 * @property string $actual_hours
 *
 * The followings are the available model relations:
 * @property Activity $activity
 * @property Employee $employee
 */
class Assignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Assignment the static model class
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
		return 'assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, activity_id', 'required'),
			array('employee_id, activity_id', 'numerical', 'integerOnly'=>true),
			array('employee_id','employeeExist'),
			array('activity_id','activityExist'),
			array('activity_id','notDuplicateAssignment','on'=>'create, update'),
			array('estimated_hours, actual_hours', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, activity_id, estimated_hours, actual_hours', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'employee_id' => 'Employee',
			'activity_id' => 'Activity',
			'estimated_hours' => 'Estimated Hours',
			'actual_hours' => 'Actual Hours',
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

		$criteria->compare('t.id',$this->id);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('estimated_hours',$this->estimated_hours,true);
		$criteria->compare('actual_hours',$this->actual_hours,true);
		$criteria->with='activity';
		$criteria->compare('activity.description',$params['activityDescription'],true);
		$criteria->compare('activity.activity_date',$params['activityDate'],true);
		$criteria->compare('activity.activity_time',$params['activityTime'],true);
		$criteria->compare('activity.activity_type_id',$params['activityTypeId'],true);
		$criteria->together=true;

 		/* Sort on related Model's columns */
        $sort = new CSort;
        $sort->attributes = array(
            'activity.description' => array(
            	'asc' => 'description',
            	'desc' => 'description DESC',
            ),
            'activity.activity_date' => array(
            	'asc' => 'activity_date',
            	'desc' => 'activity_date DESC',
            ),
            'activity.activity_time' => array(
            	'asc' => 'activity_time',
            	'desc' => 'activity_time DESC',
            ),                        
            '*', /* Treat all other columns normally */
        );
        /* End: Sort on related Model's columns */

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort, /* Needed for sort */
		));
	}

	public function activityExist($attribute)
    {
    	if (!Activity::model()->findByPk($this->$attribute))
    		$this->addError($attribute,'The Activity does not exist');
    }

    public function employeeExist($attribute)
    {
    	if (!Employee::model()->findByPk($this->$attribute))
    		$this->addError($attribute,'The employee does not exist');
    }

    public function notDuplicateAssignment($attribute=NULL, $params=NULL)
    {
    	if (self::model()->findAllByAttributes(array(
    		'activity_id'=>$this->activity_id,
    		'employee_id'=>$this->employee_id,
    	))) {
    		$this->addError($attribute,'This assignment Employee-Activity already exists');
    	}
    }

    public function behaviors()
	{
	    return array(
	        'LoggableBehavior'=>
	            'ext.auditTrail.behaviors.LoggableBehavior',
	    );
	}

}