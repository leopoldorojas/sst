<?php

class m120805_183408_create_activity_type_table extends CDbMigration
{
	public function up()
	{
			$this->createTable('activity_type', array(
			'id' => 'pk',
			'description'	=> 'string NOT NULL',
			'enabled' => 'boolean',
			'service_types' => 'string', 
			'createdon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m120805_183408_create_activity_type_table does not support migration down.\n";
		// return false;
		$this->dropTable('activity_type');		
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
