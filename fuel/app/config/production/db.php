<?php
/**
 * The production database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=' . getenv('WOMANSHIFT_DEFAULT_MYSQL_URL'),
			'username'   => 'womanshift',
			'password'   => getenv('WOMANSHIFT_DEFAULT_MYSQL_PASSWORD'),
		),
	),
);
