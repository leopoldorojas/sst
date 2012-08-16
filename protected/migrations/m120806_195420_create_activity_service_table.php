<?php

class m120806_195420_create_activity_service_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('activity_service', array(
			'id' => 'pk',
			'activity_id'	=> 'integer NOT NULL',
			'service_id'	=> 'integer NOT NULL',	
			'room' => 'string',
			'notes' => 'text',
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120806_195420_create_activity_service_table does not support migration down.\n";
		// return false;
		$this->dropTable('activity_service');
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