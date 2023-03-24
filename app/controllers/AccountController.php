<?php

use App\Core\Controller;

class AccountController extends Controller
{

    private $data = [];

    public function index()
    {
        $accountAvatar = $this->model('AccountModel');
        $title = 'Trang tài khoản';

        $userInfo = $accountAvatar->getUserInfo($_SESSION['id']);

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

    public function updateInfo()
    {
        $accountUpdateInfo = $this->model('AccountModel');
        $title = 'Trang cập nhật thông tin';

        $userInfo = $accountUpdateInfo->getUserInfo($_SESSION['id']);
        $username = $_POST['username'] ?? '';
        $fullname = $_POST['fullname'] ?? '';
        $email    = $_POST['email'] ?? '';
        $phone    = $_POST['phone'] ?? '';
        $address  = $_POST['address'] ?? '';

        $dataUserInfo = [
            'username' => $username,
            'fullname' => $fullname,
            'email'    => $email,
            'phone_number'    => $phone,
            'address'  => $address,
        ];

        if (isset($_POST['updateInfo'])) {
            header('Content-Type: application/json');
            $accountUpdateInfo->updateUserInfo($_SESSION['id'], $dataUserInfo);
            $response = [
                'statusCode' => 200,
                'message'    => 'Cập nhật thông tin thành công',
            ];
            header('HTTP/1.1 200 OK');
            echo json_encode($response);
            die();
        }

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'userInfo' => $userInfo,
            ],
            'content'    => 'user/updateInfo',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function changePass()
    {
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

    public function order()
    {
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
