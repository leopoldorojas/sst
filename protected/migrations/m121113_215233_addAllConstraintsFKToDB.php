<?php

class m121113_215233_addAllConstraintsFKToDB extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('fk_activity-activity_type', 'activity', 'activity_type_id', 'activity_type', 'id','CASCADE','CASCADE');
		$this->addForeignKey('fk_activity_service-activity', 'activity_service', 'activity_id', 'activity', 'id','CASCADE','CASCADE');
		$this->addForeignKey('fk_assignment-employee', 'assignment', 'employee_id', 'employee', 'id','CASCADE','CASCADE');
		$this->addForeignKey('fk_assignment-activity', 'assignment', 'activity_id', 'activity', 'id','CASCADE','CASCADE');
		$this->addForeignKey('fk_service-booking', 'service', 'booking_id', 'booking', 'id','CASCADE','CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('fk_activity-activity_type', 'activity');
		$this->dropForeignKey('fk_activity_service-activity', 'activity_service');
		$this->dropForeignKey('fk_assignment-employee', 'assignment');
		$this->dropForeignKey('fk_assignment-activity', 'assignment');
		$this->dropForeignKey('fk_service-booking', 'service');
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