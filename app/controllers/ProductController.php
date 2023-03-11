<?php
use App\Core\Controller;

class ProductController extends Controller
{
    private $data = [];

    public function list_product()
    {
        echo 'Danh sách sản phẩm';
    }

    public function detail($id = 0)
    {
        echo 'Chi tiết sản phẩm';
    }
}
