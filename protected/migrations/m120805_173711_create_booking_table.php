<?php

class m120805_173711_create_booking_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('booking', array(
			'id' => 'pk',
			'bookingid' => 'string NOT NULL UNIQUE',			
			'bhdid'	=> 'string NOT NULL UNIQUE',
			'booking_code' => 'string NOT NULL UNIQUE',
			'name'	=> 'string',
			'traveldate'	=> 'date',
			'agent'	=> 'string',
			'status'	=> 'string',
			'consultant'	=> 'string',
			'priority' => 'string',
			'notes'	=> 'text',
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120805_173711_create_booking_table does not support migration down.\n";
		// return false;
		$this->dropTable('booking');
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
