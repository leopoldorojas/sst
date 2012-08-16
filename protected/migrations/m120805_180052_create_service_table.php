<?php

class m120805_180052_create_service_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('service', array(
			'id' => 'pk',
			'booking_id' => 'integer NOT NULL',			
			'day'	=> 'integer',
			'seq'	=> 'integer',
			'delivery_date'	=> 'date',
			'description'	=> 'text',
			'pickup'	=> 'string',
			'pickuptime'	=> 'time',
			'droppoff' => 'string',
			'dropofftime' => 'time',
			'voucher' => 'string',
			'supplier' => 'string',
			'guide'	=> 'string',
			'pax_number'	=> 'integer',
			'ops'	=> 'boolean',
			'sell' => 'money',
			'cost' => 'money',
			'service_type' => 'string',
			'createdon' => 'timestamp',
		));
	}

	public function down()
	{
		// echo "m120805_180052_create_service_table does not support migration down.\n";
		// return false;
		$this->dropTable('service');		
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
