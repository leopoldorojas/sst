<?php

class m120805_184311_create_employee_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('employee', array(
			'id' => 'pk',
			'name'	=> 'string NOT NULL',
			'apellido' => 'string NOT NULL',
			'identification_number'	=> 'string',
			'rol'	=> 'string',
			'cost_per_hour' => 'money',
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120805_184311_create_employee_table does not support migration down.\n";
		// return false;
		$this->dropTable('employee');		
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
