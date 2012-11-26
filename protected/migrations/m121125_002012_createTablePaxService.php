<?php

class m121125_002012_createTablePaxService extends CDbMigration
{
	public function up()
	{
		$this->createTable('pax_service', array(
			'id' => 'pk',
			'pax_id' => 'integer NOT NULL',						
			'service_id'	=> 'integer NOT NULL',
			'notes' => 'text',
			'createdon' => 'timestamp NOT NULL',
		// ),  'ENGINE=InnoDB');
		));
	}

	public function down()
	{
		$this->dropTable('pax_service');	
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