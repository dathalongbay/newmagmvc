<?php
session_start();

$admin_path = dirname(__FILE__);
$site_path = dirname($admin_path);
define('SITE_PATH', $site_path);
define('IS_ADMIN', 1);
define('ADMIN_PATH', $admin_path);
define('ADMIN_APP_PATH', $admin_path.'/app');
define('ADMIN_CONTROLLER_PATH', $admin_path.'/app/controllers');
define('ADMIN_MODEL_PATH', $admin_path.'/app/models');
define('ADMIN_VIEW_PATH', $admin_path.'/app/views');
define('CORE_PATH', $site_path.'/core');
define('DB_PATH', $site_path.'/core/database');
define('HELPER_PATH', $site_path.'/core/helper');
define('ADMIN_URL', 'http://localhost/PHPMVCBYME-master_lastest/PHPMVCBYME-master_lastest/phpmvc/admin/');
define('ADMIN_URL_ASSETS', ADMIN_URL.'assets/');
define('URL_UPLOAD', 'http://localhost/PHPMVCBYME-master_lastest/PHPMVCBYME-master_lastest/phpmvc/uploads/');
//

spl_autoload_register(function ($class_name) {
    $paths = array(ADMIN_APP_PATH, ADMIN_CONTROLLER_PATH, ADMIN_MODEL_PATH, ADMIN_VIEW_PATH, CORE_PATH, DB_PATH, HELPER_PATH);
    foreach ($paths as $class_file_path) {
        $full_path = $class_file_path.'/'.$class_name.'.php';
        if (file_exists($full_path)) {
            require $full_path;
        }
    }
});

$app = new Application();
$app->run();
