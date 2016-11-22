<?php

namespace Fuel\Migrations;

class Add_sns_accounts
{
	public function up()
	{
		\DBUtil::add_fields('councilors', array(
			'twitter' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'facebook' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'link' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('', array(
			'twitter'
,			'facebook'
,			'link'

		));
	}
}
