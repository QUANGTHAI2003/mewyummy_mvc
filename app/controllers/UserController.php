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

        $username = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['passwordConfirm'] ?? '';
        $checkEmail = $userRegister->checkEmailExist($email);

        $data = [
            'fullname' => 'Nguyễn Văn A',
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if (isset($_POST['register'])) {
            header('Content-Type: application/json');
            if (!$checkEmail) {
                if ($password == $password_confirm) {
                    $userRegister->insertUser($data);
                    $response = [
                        'statusCode' => 200,
                        'message' => 'Đăng ký thành công'
                    ];
                    header('HTTP/1.1 200 OK');
                    echo json_encode($response);
                    die();
                } else {
                    $response = [
                        'statusCode' => 401,
                    ];
                    header('HTTP/1.1 401 Unauthorized');
                    echo json_encode($response);
                    die();
                }
            } else {
                $response = [
                    'statusCode' => 409,
                ];
                header('HTTP/1.1 409 Conflict');
                echo json_encode($response);
                die();
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

        $email = $_POST['email'] ?? '';
        $code = md5(rand());
        $checkEmail = $userForgot->checkEmailExist($email);

        if (isset($_POST['forgotpass'])) {
            header('Content-Type: application/json');
            if ($checkEmail) {
                $userForgot->updateCode($code, $email);
                sendMail($email, $code);
                $response = [
                    'statusCode' => 200,
                    'message' => 'Email đã được gửi'
                ];
                header('HTTP/1.1 200 OK');
                echo json_encode($response);
                die();
            } else {
                $response = [
                    'statusCode' => 401,
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
