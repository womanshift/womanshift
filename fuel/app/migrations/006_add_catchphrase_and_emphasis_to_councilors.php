<?php

namespace Fuel\Migrations;

class Add_catchphrase_and_emphasis_to_councilors
{
	public function up()
	{
		\DBUtil::add_fields('councilors', array(
			'catchphrase' => array('type' => 'text'),
			'emphasis' => array('type' => 'text'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('councilors', array(
			'catchphrase'
,			'emphasis'

		));
	}
}
