<?php

use App\Core\Controller;

class ContactController extends Controller {

    private $data = [];

    public function index() {
        $title = 'Trang giới thiệu';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title' => $title,
            ],
            'content'    => 'contact',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }
}