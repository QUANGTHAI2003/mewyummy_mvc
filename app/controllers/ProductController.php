<?php
namespace App\Controller;
use App\Core\Controller;

class ProductController extends Controller
{
    private $data = [];

    public function list_product()
    {
        $product = Controller::model('ProductModel');
        $productList = $product->getProduct();
        $productCate = $product->getCategory();
        $title = 'Danh sách sản phẩm';

        // Create slug for product
        $productList = addSlug($productList);

        // Pagination
        $total = count($productList);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $offset = ($page - 1) * $limit;
        $totalPage = ceil($total / $limit);
        $productList = array_slice($productList, $offset, $limit);

        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
                'product_list' => $productList,
                'product_cate' => $productCate,
                'total_page' => $totalPage,
            ],
            'content' => 'products/list',
        ];      
        Controller::render('layouts/client_layout', $this->data);
    }

    public function detail($id = 0)
    {
        $product = Controller::model('ProductModel');
        $productDetail = $product->getDetail($id);
        $category_id = $productDetail[0]['category_id'];
        $productRelate = $product->getRelateCategoryProduct($category_id, $id);
        $productRelate = addSlug($productRelate);


        $title = 'Chi tiết sản phẩm';

        $this->data = [
            'page_title' => $title,
            'data' => [
                'page_title' => $title,
                'product_detail' => $productDetail,
                'product_relate' => $productRelate,
            ],
            'content' => 'products/detail',
        ];

        Controller::render('layouts/client_layout', $this->data);
    }
}
