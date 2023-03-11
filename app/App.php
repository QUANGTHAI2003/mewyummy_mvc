<?php

namespace App;
use App\Core\Route;
class App
{
    private $__controller;
    private $__action;
    private $__params;
    private $__routes;
    public $__db;
    static public $app;

    public function __construct()
    {
        global $routes, $config;

        self::$app = $this;

        $this->__routes = new Route();

        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = 'index';
        $this->__params = [];

        $this->handleUrl();
    }

    public function handleUrl()
    {
        $url = $this->__routes->getUrl();
        $url = $this->__routes->handleRoute($url);
        $urlArr = array_filter(explode('/', $url));

        $urlCheck = '';
        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $item) {
                $urlCheck .= $item . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck = implode('/', $fileArr);

                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }

                if (file_exists('app/controllers/' . ($fileCheck) . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }

        // Xử lý controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }

        //Xử lý khi $urlCheck rỗng
        if (empty($urlCheck)) {
            $urlCheck = $this->__controller;
        }

        if (file_exists('app/controllers/' . $urlCheck . '.php')) {
            require_once 'controllers/' . $urlCheck . '.php';

            // Kiểm tra class $this->__controller tồn tại
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);

                if (!empty($this->__db)) {
                    $this->__controller->db = $this->__db;
                }
            } else {
                $this->loadError();
                return false;
            }
        } else {
            $this->loadError();
            return false;
        }
        // Xử lý action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // Xử lý params
        $this->__params = array_values($urlArr);

        // Kiểm tra method tồn tại
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError();
            return false;
        }
    }

    public function loadError(string $name = '404', array $data = [])
    {
        extract($data);
        include_once 'errors/' . $name . '.php';
        if($name == '404') {
            header('HTTP/1.0 404 Not Found');
            http_response_code(404);
        }
    }
}
