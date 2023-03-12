<?php
use App\Core\Controller;

class UserController extends Controller
{
    public $data = [];
    public function index()
    {
        echo 'Danh sách sản phẩm';
    }

    public function login()
    {
        $title = 'Trang đăng nhập';

        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
            ],
            'content' => 'user/login',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function register()
    {
        $title = 'Trang đăng ký';

        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
            ],
            'content' => 'user/register',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function logout()
    {
        echo 'Đăng xuất';
    }
}