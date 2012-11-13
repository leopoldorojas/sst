<?php

class m121113_213010_convertInnoDBToPaxTable extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("ALTER TABLE pax ENGINE = InnoDB;")->execute();
	}

	public function down()
	{
		$this->dbConnection->createCommand("ALTER TABLE pax ENGINE = MyISAM;")->execute();
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