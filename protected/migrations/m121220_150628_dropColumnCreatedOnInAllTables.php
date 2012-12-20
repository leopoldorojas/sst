<?php

class m121220_150628_dropColumnCreatedOnInAllTables extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('activity', 'createdon');
		$this->dropColumn('activity_type', 'createdon');
		$this->dropColumn('employee', 'createdon');
		$this->dropColumn('user', 'createdon');
		$this->dropColumn('assignment', 'createdon');
		$this->dropColumn('pax_service', 'createdon');
		$this->dropColumn('activity_service', 'createdon');
	}

	public function down()
	{
		$this->addColumn('activity', 'createdon', 'timestamp');
		$this->addColumn('activity_type', 'createdon', 'timestamp');
		$this->addColumn('employee', 'createdon', 'timestamp');
		$this->addColumn('user', 'createdon', 'timestamp');
		$this->addColumn('assignment', 'createdon', 'timestamp');
		$this->addColumn('pax_service', 'createdon', 'timestamp');
		$this->addColumn('activity_service', 'createdon', 'timestamp');
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