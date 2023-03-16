<?php

use App\Core\Controller;

class UserController extends Controller
{
    public $data = [];

    public function login()
    {
        $userLogin = $this->model('UserModel');
        $title = 'Trang đăng nhập';

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';


        if (isset($_POST['login'])) {
            $checkUser = $userLogin->getUsers($email, $password);
            header('Content-Type: application/json');
            if ($checkUser) {
                $_SESSION['user'] = $checkUser['fullname'];
                $_SESSION['isLogged'] = true;
                $response = [
                    'statusCode' => 200,
                    'message' => 'Đăng nhập thành công',
                ];
                header('HTTP/1.1 200 OK');
                echo json_encode($response);
                die();
            } else {
                $response = [
                    'statusCode' => 401,
                    'message' => 'Đăng nhập thất bại',
                ];
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode($response);
                die();
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
