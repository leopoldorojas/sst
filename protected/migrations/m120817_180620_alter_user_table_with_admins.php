<?php

class m120817_180620_alter_user_table_with_admins extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'rol', 'string');
	}

	public function down()
	{
		// echo "m120817_180620_alter_user_table_with_admins does not support migration down.\n";
		// return false;
		$this->dropColumn('user', 'rol');
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