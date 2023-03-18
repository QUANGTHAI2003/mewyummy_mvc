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

  function addToCart()
  {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $image = $_POST['image'] ?? '';
    $salePrice = $_POST['salePrice'] ?? '';
    $regularPrice = $_POST['regularPrice'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

    $product = [
      'id' => $id,
      'name' => $name,
      'image' => $image,
      'salePrice' => $salePrice,
      'regularPrice' => $regularPrice,
      'quantity' => $quantity,
    ];

    if (empty($_SESSION['cart'])) {
      $_SESSION['cart'][] = $product;
    } else {
      $isAvailable = false;
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['name'] === $name) {
          $isAvailable = true;
          $_SESSION['cart'][$key]['quantity'] += $quantity;
          break;
        }
      }
      if (!$isAvailable) {
        $_SESSION['cart'][] = $product;
      }
    }
  }

  function updateQuantity()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    if (!empty($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $id) {
          $_SESSION['cart'][$key]['quantity'] += $quantity;
        }
      }
    }
  }


  function deleteCart()
  {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['id'] == $id) {
        unset($_SESSION['cart'][$key]);
      }
    }
  }
}
