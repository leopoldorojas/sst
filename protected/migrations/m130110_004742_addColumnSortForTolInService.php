<?php

class m130110_004742_addColumnSortForTolInService extends CDbMigration
{
	public function up()
	{
		$this->addColumn('service', 'sortForTol', 'integer');
	}

	public function down()
	{
		// echo "m130110_004742_addColumnSortForTolInService does not support migration down.\n";
		// return false;
		$this->dropColumn('service', 'sortForTol');
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