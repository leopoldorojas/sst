<?php

class m120807_193624_alter_employee_table extends CDbMigration
{
	public function up()
	{
			$this->renameColumn('employee', 'apellido', 'lastname');
	}

	public function down()
	{
		// echo "m120807_193624_alter_employee_table does not support migration down.\n";
		// return false;
		$this->renameColumn('employee', 'lastname', 'apellido');
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