<?php

class m121220_142248_changeTableServiceForLoadStoreProcedure extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('service', 'createdon', 'datetime'); // Ver si puedo con SQL-Manager
		$this->addColumn('service','optlwdate','datetime');
	}

	public function down()
	{
		// $this->alterColumn('service', 'createdon', 'timestamp'); // Ver si puedo con SQL-Manager
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