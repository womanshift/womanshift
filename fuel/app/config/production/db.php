<?php
/**
 * The production database settings. These get merged with the global settings.
 */

# TODO 環境変数
return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=' . $_ENV['WOMANSHIFT_DEFAULT_MYSQL_URL'],
			'username'   => 'womanshift',
			'password'   => $_ENV['WOMANSHIFT_DEFAULT_MYSQL_PASSWORD'],
		),
	),
);
