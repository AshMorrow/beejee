<?php

/**
 * Database settings
 */
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'tasks');
define ('DB_USER_NAME', 'root');
define ('DB_PASSWORD', '1111');

/**
 * Path definitions
 */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . DS);
define('DIR_VIEW', ROOT . 'View'.DS);
define('DIR_WEB', ROOT . 'Webroot'.DS);
define('DIR_UPLOADS', DIR_WEB. 'uploads' . DS);

/**
 * Redirects
 */

define('R_LOGGED', '/admin');
define('R_LOGOUT', '/login');
define('R_LOGIN_ERROR', '/login');

/**
 * Login error time limit
 * in seconds
 */

define('A_TIME_LIMIT', 300);

/***
 * Auth error limit
 */

define('A_ERROR_LIMIT', 3);

/**
 * Pagination
 */

define('P_PER_PAGE', 3);
define('P_ADMIN_PER_PAGE', 10);