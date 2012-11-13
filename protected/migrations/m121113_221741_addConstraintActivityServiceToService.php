<?php

class m121113_221741_addConstraintActivityServiceToService extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('fk_activity_service-service', 'activity_service', 'service_id', 'service', 'id','CASCADE','CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_activity_service-service', 'activity_service');
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