<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $Password 			// This is the password to save in db
 * @property string $email
 * @property string $salt
 * @property string $profile
 * @property string $createdon
 * @property string $rol
 * @property string $password_onscreen // This is a property that it is not necessary to save in db
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */

	public $password_onscreen;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, password, password_onscreen', 'required'),
			array('username', 'unique'),
			array('name', 'length', 'max'=>50),
			array('username, password_onscreen', 'length', 'max'=>20),
			array('password', 'length', 'max'=>255),
			array('email', 'email'),
			array('rol', 'in', 'range'=>array('public', 'authenticated', 'admin', 'superadmin')),
			array('profile', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, username, email, profile, rol', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'username' => 'Username',
			'password' => 'Password',
			'password_onscreen' => 'Password',
			'email' => 'Email',
			'salt' => 'Salt',
			'profile' => 'Profile',
			'createdon' => 'Createdon',
			'rol'=>'Rol',
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
		$criteria->compare('username',$this->username,true);
		// $criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		// $criteria->compare('salt',$this->salt,true);
		$criteria->compare('profile',$this->profile,true);
		// $criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('rol',$this->rol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Validates if the password is valid from user table
	 * @return a boolean. TRUE if the password is valid. FALSE otherwise.
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}

	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}
}