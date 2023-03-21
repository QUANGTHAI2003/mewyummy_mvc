<?php

use App\Core\Controller;

class AccountController extends Controller {

    private $data = [];

    public function index() {
        $accountAvatar = $this->model('AccountModel');
        $title = 'Trang tài khoản';

        $userInfo = $accountAvatar->getUserInfo();

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
                'userInfo'     => $userInfo,
            ],
            'content'    => 'user/account',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function updateInfo() {
        $title = 'Trang cập nhật thông tin';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/updateInfo',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function changePass() {
        $title = 'Trang đổi mật khẩu';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/changePass',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function order() {
        $title = 'Trang đơn hàng';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/order',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }
}
