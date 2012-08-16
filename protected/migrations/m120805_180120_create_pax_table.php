<?php

class m120805_180120_create_pax_table extends CDbMigration
{
	public function up()
	{
			$this->createTable('pax', array(
			'id' => 'pk',
			'booking_id' => 'integer NOT NULL',						
			'name'	=> 'string NOT NULL',
			'age'	=> 'integer',
			'passport'	=> 'string',
			'height'	=> 'string',
			'weight'	=> 'string',
			'arrival_detail'	=> 'string',
			'arrival_time' => 'datetime',
			'departure_detail' => 'string',
			'departure_time' => 'datetime',
			'room' => 'string',			
			'notes' => 'text',
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120805_180120_create_pax_table does not support migration down.\n";
		// return false;
		$this->dropTable('pax');		
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
