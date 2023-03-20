<?php

use App\Core\Controller;

class AboutController extends Controller {

    private $data = [];

    public function index() {
        $title = 'Trang giới thiệu';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'about',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }
}