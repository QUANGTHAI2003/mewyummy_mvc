<?php

namespace App\Core;

class Controller {

    public $db;

    public static function render(string $view, string|array $data = [])
    : void {
        extract($data);
        if(file_exists(_DIR_ROOT . '/app/views/' . $view . '.php')) {
            require_once _DIR_ROOT . '/app/views/' . $view . '.php';
        }
    }

    public function model(string $model) {
        if(file_exists(_DIR_ROOT . '/app/models/' . $model . '.php')) {
            require_once _DIR_ROOT . '/app/models/' . $model . '.php';
            if(class_exists($model)) {
                $model = new $model();

                return $model;
            }
        }

        return false;
    }
}

?>