<?php


use App\Core\Controller;
use App\Core\Pagination;

class ProductController extends Controller
{

    public function list_product()
    {
        $product     = Controller::model('ProductModel');
        $productList = $product->getProduct();
        $productCate = $product->getCategory();
        $title       = 'Danh sách sản phẩm';

        // Create slug for product
        $productList = addSlug($productList);

        // Pagination
        $total       = count($productList);
        $page        = $_GET['page'] ?? 1;
        $limit       = 8;
        $offset      = ($page - 1) * $limit;
        $totalPage   = ceil($total / $limit);
        $productList = array_slice($productList, $offset, $limit);

        $pagination = new Pagination($totalPage, $page);
        $pagination = $pagination->generateMarkup();

        $data = [
            'page_title' => $title,
            'data'       => [
                'product_list' => $productList,
                'product_cate' => $productCate,
                'total_page'   => $totalPage,
                'pagination'   => $pagination,
            ],
            'content'    => 'products/list',
        ];
        Controller::render('layouts/client_layout', $data);
    }

    public function detail($id = 0)
    {
        $product       = Controller::model('ProductModel');

        // Get product
        $productDetail = $product->getDetail($id);
        $category_id   = $productDetail[0]['category_id'];
        $productRelate = $product->getRelateCategoryProduct($category_id, $id);
        $productRelate = addSlug($productRelate);

        // Comment
        $productComment = $product->getAllCommentMain($id);
        $productReply = $product->getRepliesComment($id);

        $title = 'Chi tiết sản phẩm';

        $data = [
            'page_title' => $title,
            'data'       => [
                'product_detail' => $productDetail,
                'product_relate' => $productRelate,
                'product_comment' => $productComment,
                'product_reply' => $productReply,
            ],
            'content'    => 'products/detail',
        ];

        Controller::render('layouts/client_layout', $data);
    }

    public function addComment()
    {
        $comment = Controller::model('ProductModel');
        $id = $_POST['productId'] ?? 0;
        $commentData = [
            'user_id'    => $_SESSION['id'] ?? 0,
            'children_id' => $_POST['childrenId'] ?? -1,
            'product_id' => $id,
            'comment'    => $_POST['comment'] ?? '',
            'comment_id' => $_POST['commentId'] ?? 0,
        ];

        

        if (isset($_POST['addComment'])) {
            $comment->insertComment($commentData);
        }
        $productComment = $comment->getAllCommentMain($id);
        $productReply = $comment->getRepliesComment($id);
        $output = '';

        foreach ($productComment as $cmt_main) {
            $output .= '
                <div class="comment__content-item mb-3">
                    <div class="comment__main">
                        <div class="comment__main-content">
                            <div class="author-thumbnail">
                                <img src="' . _PUBLIC_UPLOADS . '/' . $cmt_main['avatar'] . '" alt="avatar">
                            </div>
                            <div class="content__main">
                                <div class="author-name">
                                    <span>' . $cmt_main['fullname'] . '</span>
                                    <span class="time">' . timeAgo($cmt_main['created_at']) . '</span>
                                </div>
                                <div class="content">
                                    <p>' . $cmt_main['comment'] . '</p>
                                </div>
                                <div class="content__main-reaction">
                                    <div class="reaction">
                                        <i class="fa-solid fa-thumbs-up icon"></i>
                                        <span>Thích</span>
                                    </div>
                                    <div class="reaction btnResParent" data-parent-id="' . $cmt_main['id'] . '">
                                        <i class="fa-solid fa-comment icon"></i>
                                        <span>Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

            if (isset($_SESSION['isLogged'])) {
                $output .= '
                    <div class="comment__box reply hide comment-parent-' . $cmt_main['id'] . '">
                        <div class="comment__box-avatar">
                            <img src="' . _PUBLIC_UPLOADS . '/' . ($_SESSION['avatar'] ?? '') . '" alt="avatar">
                        </div>
                        <div class="comment__box-input">
                            <input type="text" class="input-main comment-input-' . $cmt_main['id'] . '" id="commentMain" placeholder="Viết bình luận...">
                            <button type="submit" class="btn btn-primary btnSendReply" data-comment="' . $cmt_main['id'] . '" data-comment-id="' . $cmt_main['id'] . '">Gửi</button>
                        </div>
                    </div>';
            }

            foreach ($productReply as $reply) {
                if ($cmt_main['id'] == $reply['comment_id']) {
                    $output .= '
                        <div class="comment__replies">
                            <div class="author-thumbnail">
                                <img src="' . _PUBLIC_UPLOADS . '/' . $reply['avatar'] . '" alt="avatar">
                            </div>
                            <div class="content__main">
                                <div class="author-name">
                                    <span>' . $reply['fullname'] . '</span>
                                    <span class="time">' . timeAgo($reply['created_at']) . '</span>
                                </div>
                                <div class="content">
                                    <p>' . $reply['comment'] . '</p>
                                </div>
                                <div class="content__main-reaction">
                                    <div class="reaction">
                                        <i class="fa-solid fa-thumbs-up icon"></i>
                                        <span>Thích</span>
                                    </div>
                                    <div class="reaction btnRes" data-id="' . $reply['id'] . '">
                                        <i class="fa-solid fa-comment icon"></i>
                                        <span>Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </div>';

                    if (isset($_SESSION['isLogged'])) {
                        $output .= '
                            <div class="comment__box reply hide comment-' . $reply['id'] . '">
                                <div class="comment__box-avatar">
                                    <img src="' . _PUBLIC_UPLOADS . '/' . ($_SESSION['avatar'] ?? '') . '" alt="avatar">
                                </div>
                                <div class="comment__box-input">
                                    <input type="text" class="input-main comment-input-' . $reply['id'] . '" id="commentMain" placeholder="Viết bình luận...">
                                    <button type="submit" class="btn btn-primary btnSendReply" data-comment="' . $reply['id'] . '" data-comment-id="' . $cmt_main['id'] . '">Gửi</button>
                                </div>
                            </div>';
                    }
                }
            }
            $output .= '</div>';
        }
        echo $output;
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
