<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
date_default_timezone_set('Asia/Ho_Chi_Minh');

const _DIR_ROOT = __DIR__;

$web_root = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

// Đường dẫn gốc
define('_WEB_ROOT', $web_root);
define('_PUBLIC_CLIENT', $web_root . '/public/assets/client');
define('_IMAGES_PRODUCT', $web_root . '/public/assets/client/images/products');
define('_PUBLIC_LIBS', $web_root . '/public/assets/client/libs');
define('_PUBLIC_UPLOADS', $web_root . '/public/assets/client/uploads');

// Đường dẫn tới thư mục app
require_once 'configs/routes.php';
require_once 'core/Route.php';  // Load Route class
require_once 'core/Helper.php'; // Load Helper
require_once 'app/App.php';     // Load app
require_once 'core/Connection.php';
require_once 'core/Database.php';
require_once 'core/Query.php';
require_once 'core/Controller.php'; // Load base controller
require_once 'core/SendMail.php'; // Load base model
