<?php

class m120826_200858_alter_assignment_table extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('assignment','estimated_time');
		$this->dropColumn('assignment', 'actual_time');

		/* WARNING: After apply this two following lines in MS-SQL you also need to change your decimal(18,0) for maybe decimal(18,n)
			where n is the actual decimal places you need in your application */
		$this->addColumn('assignment','estimated_hours','decimal'); 
		$this->addColumn('assignment','actual_hours','decimal');
	}

	public function down()
	{
		// echo "m120826_200858_alter_assignment_table does not support migration down.\n";
		// return false;
		$this->addColumn('assignment','estimated_time','time');
		$this->addColumn('assignment', 'actual_time','time');
		$this->dropColumn('assignment','estimated_hours');
		$this->dropColumn('assignment','actual_hours');
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