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
        $userLogin = $this->model('UserModel');
        $title = 'Trang đăng nhập';

        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['pass']) ? $_POST['pass'] : '';

        if (isset($_REQUEST['submit'])) {
            $checkUser = $userLogin->getUsers($email, $password);
            if ($checkUser) {
                $_SESSION['user'] = $checkUser['fullname'];
                $_SESSION['isLogged'] = true;
                redirect('/');
            } else {
                echo 'Sai tài khoản hoặc mật khẩu';
            }
        }


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
        $userRegister = $this->model('UserModel');

        $title = 'Trang đăng ký';

        $username = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['pass']) ? $_POST['pass'] : '';
        $password_confirm = isset($_POST['cfpass']) ? $_POST['cfpass'] : '';
        $checkEmail = $userRegister->checkEmailExist($email);
        if ($password != $password_confirm) {
            echo 'Mật khẩu không khớp';
            die;
        }

        // if($checkEmail) {
        //     echo 'Email đã tồn tại';
        //     die;
        // }

        $data = [
            'fullname' => 'Nguyễn Văn A',
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];


        if (isset($_REQUEST['submit'])) {
            if (!$checkEmail) {
                $userRegister->insertUser($data);
                $_SESSION['message'] = 'registered';
                redirect('/dang-nhap');
            } else {
                echo 'Email đã tồn tại';
            }
        }


        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
            ],
            'content' => 'user/register',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function forgotPass()
    {
        $userForgot = $this->model('UserModel');
        $title = 'Quên mật khẩu';

        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $code = md5(rand());

        if (isset($_POST['submit'])) {
            $checkEmail = $userForgot->checkEmailExist($email);
            if ($checkEmail) {
                $userForgot->updateCode($code, $email);
                sendMail($email, $code);
                redirect('/');
            }
        }

        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
            ],
            'content' => 'user/forgotPass',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function changePassForgot()
    {
        $userChange = $this->model('UserModel');
        $title = 'Đổi mật khẩu';

        if (isset($_GET['reset'])) {
            if (isset($_POST['submit'])) {
                $password = isset($_POST['pass']) ? $_POST['pass'] : '';
                $password_confirm = isset($_POST['cfpass']) ? $_POST['cfpass'] : '';
                $code = isset($_GET['reset']) ? $_GET['reset'] : '';
                if ($password == $password_confirm) {
                    $userChange->updatePass($password, $code);
                    echo 'Đổi mật khẩu thành công';
                    redirect('/dang-nhap');
                } else {
                    echo 'Mật khẩu không khớp';
                }
            }
        }

        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
            ],
            'content' => 'user/changeForgotPass',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['isLogged']);
        redirect('/');
    }
}
