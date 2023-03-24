<?php

use App\Core\Controller;

class AboutController extends Controller {

    public function index() {
        $title = 'Trang giới thiệu';

        $data = [
            'page_title' => $title,
            'data'       => [],
            'content'    => 'about',
        ];

        Controller::render('layouts/client_layout', $data);
    }
}