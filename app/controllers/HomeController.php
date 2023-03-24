<?php

use App\Core\Controller;

class HomeController extends Controller {

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

        $data = [
            'page_title' => $title,
            'data'       => [
                'product_sale'      => $productSale,
                'product_meat'      => $productMeat,
                'product_seafood'   => $productSeafood,
                'product_vegetable' => $productVegetable,
                'videos'            => $videos,
                'blogs'             => $blogs,
            ],
            'content'    => 'home/index',
        ];

        Controller::render('layouts/client_layout', $data);
    }

    public function logout() {
    }
}