<?php
/**
 * The production database settings. These get merged with the global settings.
 */

# TODO 環境変数
return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=womanshift-mysql.ctqbzjwfxytq.us-east-1.rds.amazonaws.com;dbname=womanshift',
			'username'   => 'womanshift',
			'password'   => 'WA5BL0Z1FA2vYVD9',
		),
	),
);
