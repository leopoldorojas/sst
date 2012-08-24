<?php

class m120823_233733_create_CDbAuthManager_tables2 extends CDbMigration
{
	public function up()
	{
		$this->createTable('AuthItemChild', array(
			'parent' => 'string NOT NULL',
			'child'	=> 'string NOT NULL',
		));	
	}

	public function down()
	{
		// echo "m120823_233733_create_CDbAuthManager_tables2 does not support migration down.\n";
		// return false;
		$this->dropTable('AuthItemChild');
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