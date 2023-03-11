<?php
/**
 * Đường dẫn ảo => Đường dẫn thật
 */
$routes = [
    'default_controller' => 'homecontroller',
    'trang-chu' => 'homecontroller',
    'san-pham' => 'productcontroller/list_product',
    'chi-tiet/(\d+)' => 'productcontroller/detail/$1',
    'dang-nhap' => 'usercontroller/login',
];
?>