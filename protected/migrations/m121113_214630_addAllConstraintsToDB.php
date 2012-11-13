<?php

class m121113_214630_addAllConstraintsToDB extends CDbMigration
{
	public function up()
	{
		$this->dbConnection->createCommand("ALTER TABLE service ENGINE = InnoDB;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE activity_service ENGINE = InnoDB;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE activity_type ENGINE = InnoDB;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE employee ENGINE = InnoDB;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE user ENGINE = InnoDB;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE activity ENGINE = InnoDB;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE assignment ENGINE = InnoDB;")->execute();
	}

	public function down()
	{
		$this->dbConnection->createCommand("ALTER TABLE service ENGINE = MyISAM;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE activity_service ENGINE = MyISAM;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE activity_type ENGINE = MyISAM;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE employee ENGINE = MyISAM;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE user ENGINE = MyISAM;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE activity ENGINE = MyISAM;")->execute();
		$this->dbConnection->createCommand("ALTER TABLE assignment ENGINE = MyISAM;")->execute();
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