<?php

/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $identification_number
 * @property string $rol
 * @property string $cost_per_hour
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Assignment[] $assignments
 */
class Employee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employee the static model class
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
		return 'employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, lastname', 'required'),
			array('name, lastname, identification_number, rol', 'length', 'max'=>50),
			array('cost_per_hour', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, lastname, identification_number, rol, cost_per_hour', 'safe', 'on'=>'search'),
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
			'assignments' => array(self::HAS_MANY, 'Assignment', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'lastname' => 'Lastname',
			'identification_number' => 'Identification Number',
			'rol' => 'Job position',
			'cost_per_hour' => 'Cost per Hour',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('identification_number',$this->identification_number,true);
		$criteria->compare('rol',$this->rol,true);
		$criteria->compare('cost_per_hour',$this->cost_per_hour,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getEnabledEmployees($activity_id=NULL, $inThisActivity=true)
	{
		if (!$activity_id) {
			$criteria=new CDbCriteria;
			$criteria->order='name ASC, lastname ASC';
			return self::model()->findAll($criteria);
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
			$criteria->order='name ASC, lastname ASC';
        	return self::model()->findAll($criteria);
        }
	}

}