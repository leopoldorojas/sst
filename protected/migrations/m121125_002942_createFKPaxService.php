<?php

class m121125_002942_createFKPaxService extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('fk_pax_service-pax', 'pax_service', 'pax_id', 'pax', 'id','CASCADE','CASCADE');
		$this->addForeignKey('fk_pax_service-service', 'pax_service', 'service_id', 'service', 'id','CASCADE','CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_pax_service-pax', 'pax_service');
		$this->dropForeignKey('fk_pax_service-service', 'pax_service');
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