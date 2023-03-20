<?php

use App\Core\Controller;

class HomeController extends Controller {

    private $data = [];

    public function index() {
        $product          = Controller::model('HomeModel');
        $productSale      = $product->getProductSale();
        $productMeat      = $product->getProductMeat();
        $productSeafood   = $product->getProductSeafood();
        $productVegetable = $product->getProductVegetable();
        $videos           = $product->getVideos();
        $blogs            = $product->getBlogs();
        $productSale      = addSlug($productSale);
        $productMeat      = addSlug($productMeat);
        $productSeafood   = addSlug($productSeafood);
        $productVegetable = addSlug($productVegetable);

        $title = 'Trang chủ';

        $this->data = [
            'page_title' => $title,
            'data'       => [
                'page_title'        => $title,
                'product_sale'      => $productSale,
                'product_meat'      => $productMeat,
                'product_seafood'   => $productSeafood,
                'product_vegetable' => $productVegetable,
                'videos'            => $videos,
                'blogs'             => $blogs,
            ],
            'content'    => 'home/index',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }

    public function logout() {
    }
}