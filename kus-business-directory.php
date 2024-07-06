<?php

/**
 * Plugin Name:       	 Kus Business Directory
 * Description:       	 Business Directory
 * Version:           	 1.0.0
 * Author:            	 Kus developer
 * Text Domain:       	 kus-business
 * Domain Path:          /language
 */


define('KUS_Business_Directory_PATH', plugin_dir_path(__FILE__));
define('KUS_Business_Directory_URL', plugin_dir_url(__FILE__));
define('KUS_Business_Directory_VERSION', '1.0.0');
define('KUS_Business_Directory_SLUG', 'business-directory');



require_once KUS_Business_Directory_PATH . '/load.php';

KusBusDir::init();
