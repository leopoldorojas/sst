<?php

class m120929_173535_add_uniqueness_to_service_id_in_activityservice_table extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('activity_service', 'service_id', 'integer NOT NULL UNIQUE');
	}

	public function down()
	{
		$this->alterColumn('activity_service', 'service_id', 'integer NOT NULL');
		// echo "m120929_173535_add_uniqueness_to_service_id_in_activityservice_table does not support migration down.\n";
		// return false;
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