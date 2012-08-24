<?php

class m120823_233739_create_CDbAuthManager_tables3 extends CDbMigration
{
	public function up()
	{
		$this->createTable('AuthAssignment', array(
			'itemname' => 'string NOT NULL',
			'userid'	=> 'string NOT NULL',
			'bizrule'	=> 'text',
			'data' => 'text',
		));
	}

	public function down()
	{
		// echo "m120823_233739_create_CDbAuthManager_tables3 does not support migration down.\n";
		// return false;
		$this->dropTable('AuthAssignment');
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