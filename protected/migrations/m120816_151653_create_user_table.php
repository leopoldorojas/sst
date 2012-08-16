<?php

class m120816_151653_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('user', array(
			'id' => 'pk',
			'name'	=> 'string NOT NULL',
			'username'	=> 'string NOT NULL UNIQUE',
			'password' => 'string',
			'email' => 'string',
			'salt' => 'string',
			'profile' => 'text',
			'createdon' => 'timestamp NOT NULL',
		));	
	}

	public function down()
	{
		// echo "m120816_151653_create_user_table does not support migration down.\n";
		// return false;
		$this->dropTable('user');
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