<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=' . $_ENV['WOMANSHIFT_DEFAULT_MYSQL_URL'],
			'username'   => 'root',
			'password'   => $_ENV['WOMANSHIFT_DEFAULT_MYSQL_PASSWORD'],
		),
	),
);
