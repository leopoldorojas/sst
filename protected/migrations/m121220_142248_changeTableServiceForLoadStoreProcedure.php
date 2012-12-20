<?php

class m121220_142248_changeTableServiceForLoadStoreProcedure extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('service', 'createdon', 'datetime');
		$this->addColumn('service','optlwdate','datetime');
	}

	public function down()
	{
		$this->alterColumn('service', 'createdon', 'timestamp');
		$this->dropColumn('service','optlwdate','datetime');
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