<?php

use App\Core\Controller;

class UserController extends Controller
{

    public $data = [];

    public function login()
    {
        $userLogin = $this->model('UserModel');
        $title     = 'Trang đăng nhập';

        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';


        if (isset($_POST['login'])) {
            $checkUser = $userLogin->getUsers($email, $password);
            header('Content-Type: application/json');
            if ($checkUser) {
                $_SESSION['id']       = $checkUser['id'];
                $_SESSION['user']     = $checkUser['fullname'];
                $_SESSION['isLogged'] = true;
                $response             = [
                    'statusCode' => 200,
                    'message'    => 'Đăng nhập thành công',
                ];
                header('HTTP/1.1 200 OK');
                echo json_encode($response);
                die();
            } else {
                $response = [
                    'statusCode' => 401,
                    'message'    => 'Sai tên email hoặc mật khẩu',
                ];
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode($response);
                die();
            }
        }

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/login',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function register()
    {
        $userRegister = $this->model('UserModel');

        $title = 'Trang đăng ký';

        $username         = $_POST['name'] ?? '';
        $email            = $_POST['email'] ?? '';
        $password         = $_POST['password'] ?? '';
        $password_confirm = $_POST['passwordConfirm'] ?? '';
        $checkEmail       = $userRegister->checkEmailExist($email);

        $data = [
            'fullname' => 'Trần Quang Thái',
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if (isset($_POST['register'])) {
            header('Content-Type: application/json');
            if (!$checkEmail) {
                if ($password == $password_confirm) {
                    $userRegister->insertUser($data);
                    $response = [
                        'statusCode' => 200,
                        'message'    => 'Đăng ký thành công'
                    ];
                    header('HTTP/1.1 200 OK');
                    echo json_encode($response);
                    die();
                } else {
                    $response = [
                        'statusCode' => 401,
                        'message'    => 'Mật khẩu không khớp'
                    ];
                    header('HTTP/1.1 401 Unauthorized');
                    echo json_encode($response);
                    die();
                }
            } else {
                $response = [
                    'statusCode' => 409,
                    'message'    => 'Email đã tồn tại'
                ];
                header('HTTP/1.1 409 Conflict');
                echo json_encode($response);
                die();
            }
        }

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/register',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function uploadAvatar()
    {
        $userUpload = $this->model('UserModel');
        $title      = 'Trang đăng ký';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
            $file = $_FILES['avatar'];

            if ($file['error'] === UPLOAD_ERR_OK) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if (!in_array($fileExtension, $allowedExtensions)) {
                    $response = [
                        'statusCode' => 415,
                        'message'    => 'Định dạng file không hợp lệ'
                    ];
                    header('HTTP/1.1 415 Unsupported Media Type');
                    echo json_encode($response);
                } else {
                    $uploadDir = './public/assets/client/uploads/';
                    $filename = uniqid() . '.' . $fileExtension;
                    if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                        $userUpload->uploadAvatar($_SESSION['id'], $filename);
                        $response = [
                            'statusCode' => 200,
                            'message'    => 'Đăng ký thành công'
                        ];
                        header('HTTP/1.1 200 OK');
                        echo json_encode($response);
                        die();
                    } else {
                        $response = [
                            'statusCode' => 500,
                            'message'    => 'Đã có lỗi xảy ra'
                        ];
                        header('HTTP/1.1 500 Internal Server Error');
                        echo json_encode($response);
                        die();
                    }
                }
            } else {
                $response = [
                    'statusCode' => 401,
                    'message'    => 'Đã có lỗi xảy ra'
                ];
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode($response);
                die();
            }
        }

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/uploadAvatar',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function sendMail()
    {
        $userForgot = $this->model('UserModel');
        $title      = 'Quên mật khẩu';

        $email      = $_POST['email'] ?? '';
        $code       = md5(rand());
        $checkEmail = $userForgot->checkEmailExist($email);

        if (isset($_POST['forgotpass'])) {
            header('Content-Type: application/json');
            if ($checkEmail) {
                $userForgot->updateCode($code, $email);
                sendMail($email, $code);
                $response = [
                    'statusCode' => 200,
                    'message'    => 'Đã gửi email khôi phục mật khẩu'
                ];
                header('HTTP/1.1 200 OK');
                echo json_encode($response);
                die();
            } else {
                $response = [
                    'statusCode' => 401,
                    'message'    => 'Email không tồn tại'
                ];
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode($response);
                die();
            }
        }

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/sendMail',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function resetPass()
    {
        $userChange = $this->model('UserModel');
        $title      = 'Đổi mật khẩu';

        if (isset($_POST['reset'])) {
            header('Content-Type: application/json');
            $password         = $_POST['pass'] ?? '';
            $password_confirm = $_POST['cfpass'] ?? '';
            $code             = $_GET['reset'] ?? '';
            if ($password == $password_confirm) {
                $userChange->updatePass($password, $code);
                $response = [
                    'statusCode' => 200,
                    'message'    => 'Đổi mật khẩu thành công'
                ];
                header('HTTP/1.1 200 OK');
                echo json_encode($response);
                die();
            } else {
                $response = [
                    'statusCode' => 401,
                    'message'    => 'Mật khẩu không khớp'
                ];
                header('HTTP/1.1 401 Unauthorized');
                echo json_encode($response);
                die();
            }
        }

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'user/resetPass',
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
