<?php

namespace Fuel\Migrations;

class Add_category_id
{
	public function up()
	{
		\DBUtil::add_fields('questions', array(
			'category_id' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('', array(
			'category_id'

		));
	}
}
