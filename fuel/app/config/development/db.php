<?php
/**
 * The development database settings. These get merged with the global settings.
 */
return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=' . getenv('WOMANSHIFT_DEFAULT_MYSQL_URL'),
			'username'   => 'root',
			'password'   => getenv('WOMANSHIFT_DEFAULT_MYSQL_PASSWORD'),
		),
	),
);
