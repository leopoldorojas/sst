<?php

class m121113_210832_convertInnoDBToBookingTable extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("ALTER TABLE booking ENGINE = InnoDB;")->execute();
	}

	public function down()
	{
		$this->dbConnection->createCommand("ALTER TABLE booking ENGINE = MyISAM;")->execute();
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