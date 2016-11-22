<?php

namespace Fuel\Migrations;

class Create_councilors
{
	public function up()
	{
		\DBUtil::create_table('councilors', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'location' => array('constraint' => 50, 'type' => 'varchar'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'nickname' => array('constraint' => 50, 'type' => 'varchar'),
			'icon_url' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('councilors');
	}
}
