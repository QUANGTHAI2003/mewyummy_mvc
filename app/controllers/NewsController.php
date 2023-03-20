<?php

use App\Core\Controller;

class NewsController extends Controller {

    private $data = [];

    public function index() {
        $title = 'Trang giới thiệu';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'news/index',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }
}