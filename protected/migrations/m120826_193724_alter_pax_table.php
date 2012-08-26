<?php

class m120826_193724_alter_pax_table extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('pax','arrival_time');
		$this->dropColumn('pax','departure_time');
	}

	public function down()
	{
		// echo "m120826_193724_alter_pax_table does not support migration down.\n";
		// return false;
		$this->addColumn('pax','arrival_time','datetime');
		$this->addColumn('pax','departure_time','datetime');
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