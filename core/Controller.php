<?php
    namespace App\Core;
    class Controller {

        public $db;
        public function model(string $model) {
            if(file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')) {
                require_once _DIR_ROOT.'/app/models/'.$model.'.php';
                if(class_exists($model)) {
                    $model = new $model();
                    return $model;
                }
            }
            return false;
        }
        public static function render(string $view, string|array $data = []) {
            extract($data);
            if(file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')) {
                require_once _DIR_ROOT.'/app/views/'.$view.'.php';
            }
        }
    }
?>