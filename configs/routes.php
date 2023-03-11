<?php
/**
 * Đường dẫn ảo => Đường dẫn thật
 */
$routes = [
    'default_controller' => 'homecontroller',
    'trang-chu' => 'homecontroller',
    'gioi-thieu' => 'aboutcontroller',
    'san-pham' => 'productcontroller/list_product',
    'chi-tiet/(\d+)' => 'productcontroller/detail/$1',
    "tin-tuc" => "newscontroller",
    "lien-he" => "contactcontroller",
    'gio-hang' => 'cartcontroller',
    'tai-khoan' => 'accountcontroller',
    'cap-nhat' => 'accountcontroller/updateInfo',
    'doi-mat-khau' => 'accountcontroller/changePass',
    'dang-nhap' => 'usercontroller/login',
    'dang-ky' => 'usercontroller/register',
];
?>