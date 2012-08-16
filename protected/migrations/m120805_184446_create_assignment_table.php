<?php

class m120805_184446_create_assignment_table extends CDbMigration
{
	public function up()
	{
			$this->createTable('assignment', array(
			'id' => 'pk',
			'employee_id' => 'integer NOT NULL',						
			'activity_id'	=> 'integer NOT NULL',
			'estimated_time'	=> 'time',
			'actual_time'	=> 'time',
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120805_184446_create_asignacion_table does not support migration down.\n";
		// return false;
		$this->dropTable('assignment');		
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
