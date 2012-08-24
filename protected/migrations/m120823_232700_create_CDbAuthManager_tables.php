<?php

class m120823_232700_create_CDbAuthManager_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('AuthItem', array(
			'name' => 'string NOT NULL PRIMARY KEY',
			'type'	=> 'integer NOT NULL',
			'description'	=> 'text',
			'bizrule' => 'text',
			'data' => 'text',
		));	
	}

	public function down()
	{
		// echo "m120823_232700_create_CDbAuthManager_tables does not support migration down.\n";
		// return false;
		$this->dropTable('AuthItem');
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