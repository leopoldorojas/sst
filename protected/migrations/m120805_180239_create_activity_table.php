<?php

class m120805_180239_create_activity_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('activity', array(
			'id' => 'pk',
			'activity_type_id'	=> 'integer NOT NULL',
			'description' => 'text',			
			'activity_datetime' => 'datetime',
			'completed' => 'boolean',
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120805_180239_create_activity_table does not support migration down.\n";
		// return false;
		$this->dropTable('activity');		
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
