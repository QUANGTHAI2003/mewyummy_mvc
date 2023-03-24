<?php

use App\Core\Controller;

class NewsController extends Controller {

    public function index() {
        $title = 'Trang tin tức';

        $data = [
            'page_title' => $title,
            'data'       => [],
            'content'    => 'news/index',
        ];

        Controller::render('layouts/client_layout', $data);
    }
}