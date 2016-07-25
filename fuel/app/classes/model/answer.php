<?php

class Model_Answer extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'councilor_id',
		'question_id',
		'text',
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

	protected static $_table_name = 'answers';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('councilor_id', '議員ID', 'required');
		$val->add_field('question_id', '質問ID', 'required');
		$val->add_field('text', '回答', 'required');
		$val->add_field('icon_url', 'アイコン', 'required');

		return $val;
	}
}
