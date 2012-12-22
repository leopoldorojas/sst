<?php

class m121220_142315_changeTablePaxForLoadStoreProcedure extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('pax', 'createdon', 'datetime'); // Ver si puedo con SQL-Manager
		$this->addColumn('pax','pxn_id','integer');
	}

	public function down()
	{
		// $this->alterColumn('pax', 'createdon', 'timestamp'); // Ver si puedo con SQL-Manager
		$this->dropColumn('pax','pxn_id','integer');
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