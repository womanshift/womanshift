<?php

class Model_Question extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'questions';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', '質問', 'required');
		return $val;
	}

}
