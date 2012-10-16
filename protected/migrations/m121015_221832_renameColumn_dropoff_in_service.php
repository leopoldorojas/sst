<?php

class m121015_221832_renameColumn_dropoff_in_service extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('service', 'droppoff', 'dropoff');
	}

	public function down()
	{
		$this->renameColumn('service', 'dropoff', 'droppoff');
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