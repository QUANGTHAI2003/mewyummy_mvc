<?php

use App\Core\Controller;

class ContactController extends Controller {

    public function index() {
        $title = 'Trang liên hệ';

        $data = [
            'page_title' => $title,
            'data'       => [],
            'content'    => 'contact',
        ];

        Controller::render('layouts/client_layout', $data);
    }
}