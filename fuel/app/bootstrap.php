<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';

\Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
\Autoloader::register();

\Autoloader::add_namespace('Aws', VENDORPATH.'aws/aws-sdk-php/src/', true);

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
\Fuel::$env = \Arr::get($_ENV, 'FUEL_ENV', \Fuel::DEVELOPMENT);

// Initialize the framework with the config file.
\Fuel::init('config.php');
