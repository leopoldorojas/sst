<?php

class m121113_213334_addRestrictionsToPaxBookingRelation extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('fk1', 'pax', 'booking_id', 'booking', 'id','CASCADE','CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk1', 'pax');
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