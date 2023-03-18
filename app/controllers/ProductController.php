<?php
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

    public function livesearch()
    {
        $product   = Controller::model('ProductModel');
        $keyword   = $_POST['keyword'] ?? '';
        $data      = $product->getSearchData($keyword);
        $data      = addSlug($data);
        $countData = count($data);
        $output    = '';

        if (!empty($data)) {
            $output .= '
                <div class="d-block text-left h6 searchResult__product text-white">
                    Sản phẩm (<span>' . $countData . '</span>) 
                </div>
            ';
            foreach ($data as $item) {
                $output .= '
                <div class="searchResult-products">
                    <div class="w-100">
                        <a href="#" title="' . $item['name'] . '" class="d-flex align-items-start w-100 py-2 result-item border-bottom align-item js-link">
                            <div class="result-item_image d-flex h-100 align-items-center justify-content-center">
                                <img alt="' . $item['name'] . '" src="' . _IMAGES_PRODUCT . '/' . $item['thumbnail'] . '" class="result-item_image img-fluid js-img">
                            </div>
                            <div class="result-item_detail px-2">
                                <h3 class="result-item_name mb-1 fwb js-title">' . $item['name'] . '</h3>
                            <div class="item-price d-flex align-items-center">
                                <div class="special-price fw-bold me-2">' . numberFormatPrice($item['regular_price']) . '</div>
                                <del class="old-price">' . numberFormatPrice($item['sale_price']) . '</del>
                            </div>
                            </div>
                        </a>
                    </div>
                </div>
                ';
            }
            echo $output .= '<a href="' . _WEB_ROOT . '/san-pham?keyword=' . $keyword . '" class="btn my-0 all-result fw-bold">Xem tất cả kết quả</a>';
        } else {
            echo '<a class="btn my-0 all-result fw-bold">Không tìm thấy sản phẩm</a>';
        }
    }
}
