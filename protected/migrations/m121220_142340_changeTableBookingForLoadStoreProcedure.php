<?php

class m121220_142340_changeTableBookingForLoadStoreProcedure extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('booking', 'createdon', 'datetime');
	}

	public function down()
	{
		$this->alterColumn('booking', 'createdon', 'timestamp');
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