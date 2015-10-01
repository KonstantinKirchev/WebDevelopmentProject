<?php

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');
define('DEFAULT_VIEW', 'index');
define('DEFAULT_LAYOUT', 'default');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ShoppingCart');

define('INFO_MESSAGES_SESSION_KEY', 'infoMessages');
define('ERROR_MESSAGES_SESSION_KEY', 'errorMessages');

define( 'DX_DS', DIRECTORY_SEPARATOR );
define( 'DX_ROOT_DIR', dirname( __FILE__ ) . DX_DS );
define( 'DX_ROOT_PATH', basename( dirname( __FILE__ ) ) . DX_DS );
define( 'DX_ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/cframe/' );