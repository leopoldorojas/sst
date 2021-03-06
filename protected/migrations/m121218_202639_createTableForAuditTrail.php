<?php

class m121218_202639_createTableForAuditTrail extends CDbMigration
{

	/**
	 * Creates initial version of the audit trail table
	 */
	public function up()
	{

		//Create our first version of the audittrail table	
		//Please note that this matches the original creation of the 
		//table from version 1 of the extension. Other migrations will
		//upgrade it from here if we ever need to. This was done so
		//that older versions can still use migrate functionality to upgrade.
		$this->createTable( 'tbl_audit_trail',
			array(
				'id' => 'pk',
				'old_value' => 'text',
				'new_value' => 'text',
				'action' => 'string NOT NULL',
				'model' => 'string NOT NULL',
				'field' => 'string',
				'stamp' => 'datetime NOT NULL',
				'user_id' => 'string',
				'model_id' => 'string NOT NULL',
			)
			// 'ENGINE=InnoDB' // Just for MySQL
		);

		//Index these bad boys for speedy lookups
		$this->createIndex( 'idx_audit_trail_user_id', 'tbl_audit_trail', 'user_id');
		$this->createIndex( 'idx_audit_trail_model_id', 'tbl_audit_trail', 'model_id');
		$this->createIndex( 'idx_audit_trail_model', 'tbl_audit_trail', 'model');
		$this->createIndex( 'idx_audit_trail_action', 'tbl_audit_trail', 'action');
		$this->createIndex( 'idx_audit_trail_field', 'tbl_audit_trail', 'field');
	}

	/**
	 * Drops the audit trail table
	 */
	public function down()
	{
		$this->dropTable( 'tbl_audit_trail' );
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