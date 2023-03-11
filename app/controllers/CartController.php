<?php
use App\Core\Controller;

class CartController extends Controller
{
  private $data = [];

  public function index()
  {
    $title = 'Giỏ hàng';

    $this->data = [
      'page_title' => $title,
      'data' => [
        'page_title' => $title,
      ],
      'content' => 'cart/cart',
    ];

    Controller::render('layouts/client_layout', $this->data);
  }
}