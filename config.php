<?php
// Requirements for the system to work
// PHP 8.0.0 or higher
// Mysqli extension
// MariaDB 10.4.0 or higher


define('DB_HOST', 'localhost');
define('DB_USER', 'ugur');
define('DB_PASS', 'K3dk9sz3.!*');
define('DB_NAME', 'mvc');
define('DB_PORT', '8889');
define('DB_CHARSET', 'utf8');
define('DB_PREFIX', 'swp_');


define('DEBUG', true);

// Session Names
define('SESSION_PREFIX', 'swp_');
define('LOGIN_ADMIN', SESSION_PREFIX . 'admin_login');
define('LOGIN_USER', SESSION_PREFIX . 'user_login');
define('LOGIN_TOKEN_ADMIN', SESSION_PREFIX . 'login_token_admin');
define('LOGIN_TOKEN_USER', SESSION_PREFIX . 'login_token_user');
define('LOGIN_TOKEN_TIME_ADMIN', SESSION_PREFIX . 'login_token_time_admin');
define('LOGIN_TOKEN_TIME_USER', SESSION_PREFIX . 'login_token_time_user');
define('LOGIN_TOKEN_TIME_ADMIN_LIMIT', 3600);
define('LOGIN_TOKEN_TIME_USER_LIMIT', 3600);


define('CONTROLLER_PATH', 'app/controllers/');
define('ADMIN_CONTROLLER_PATH', 'app/controllers/admincp/');
define('MODEL_PATH', 'app/models/');
define('VIEW_PATH', 'app/views/');
define('HELPER_PATH', 'app/helpers/');
define('MIDDLEWARE_PATH', 'app/middleware/');
define('THEME_PATH', VIEW_PATH . 'themes/');


define("SITE_URL", (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/" . basename(dirname(__FILE__)));
define("ADMIN_URL", SITE_URL . '/admincp/');

define('DEFAULT_LANG_ISNULL', 'en');
