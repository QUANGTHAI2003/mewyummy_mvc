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
        echo 'Đăng nhập';
    }
}