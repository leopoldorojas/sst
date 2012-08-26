<?php

class m120826_200836_alter_activity_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('activity','activity_date','date');
		$this->addColumn('activity','activity_time','time');
		$this->dropColumn('activity','activity_datetime');
	}

	public function down()
	{
		// echo "m120826_200836_alter_activity_table does not support migration down.\n";
		// return false;
		$this->dropColumn('activity','activity_date');
		$this->dropColumn('activity', 'activity_time');
		$this->addColumn('activity','activity_datetime','datetime');
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