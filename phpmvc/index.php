<?php
session_start();

$site_path = dirname(__FILE__);
define('SITE_PATH', $site_path);
define('IS_ADMIN', 0);
define('APP_PATH', SITE_PATH.'/app');
define('CONTROLLER_PATH', SITE_PATH.'/app/controllers');
define('MODEL_PATH', SITE_PATH.'/app/models');
define('VIEW_PATH', SITE_PATH.'/app/views');
define('CORE_PATH', SITE_PATH.'/core');
define('DB_PATH', SITE_PATH.'/core/database');
define('HELPER_PATH', SITE_PATH.'/core/helper');
define('URL', 'http://localhost/PHPMVCBYME-master_lastest/PHPMVCBYME-master_lastest/phpmvc/');
define('URL_ASSETS', URL.'assets/');

spl_autoload_register(function ($class_name) {
    $paths = array(APP_PATH, CONTROLLER_PATH, MODEL_PATH, VIEW_PATH, CORE_PATH, DB_PATH, HELPER_PATH);
    foreach ($paths as $class_file_path) {
        $full_path = $class_file_path.'/'.$class_name.'.php';
        if (file_exists($full_path)) {
            require $full_path;
        }
    }
});

$app = new Application();
$app->run();
