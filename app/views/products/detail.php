<section class="bread__crumb">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item" aria-current="page">Sản phẩm</li>
        <li class="breadcrumb-item active" aria-current="page"><?= $product_detail[0]['name'] ?></li>
      </ol>
    </nav>
  </div>
</section>
<div class="detail-layout">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-12">
        <form class="row">
          <div class="col-12">
            <h1 class="product-name"><?= $product_detail[0]['name'] ?></h1>
            <input type="hidden" id="productId" value="<?= $product_detail[0]['id'] ?>">
          </div>
          <div class="product-layout_col-left col-12 col-sm-12 col-md-5
            col-lg-6 col-xl-6 mb-3">
            <img class="product-image" src="<?= _IMAGES_PRODUCT ?>/<?= $product_detail[0]['thumbnail'] ?>" alt="<?= $product_detail[0]['name'] ?>">
          </div>
          <div class="product-layout_col-right col-12 col-sm-12 col-md-7
            col-lg-6 col-xl-6 product-warp">
            <div class="product-info position-relative">
              <span class="in_1"> Tình trạng: <span class="inventory_quantity">Còn hàng</span>
              </span>
              <span class="in_1">
                <b class="d-inline-block">|</b>Thương hiệu: <span id="vendor">KingBeef</span>
              </span>
            </div>
            <div class="product-info position-relative mb-3">Loại: <span id="type">Thịt nhập khẩu</span>
            </div>
            <div class="product-summary"> Đang cập nhật </div>
            <?php
            if ($product_detail[0]['sale_price'] == 0) {
              $product_detail[0]['sale_price'] = $product_detail[0]['regular_price'];
              $hideOldPrice = false;
            } else {
              $hideOldPrice = true;
            }
            ?>
            <div class="product-price">
              <span class="special-price"><?= numberFormatPrice($product_detail[0]['sale_price']) ?? 0 ?></span>
              <input type="hidden" id="salePrice" value="<?= $product_detail[0]['sale_price'] ?>">
              <del class="old-price"><?= ($hideOldPrice) ? numberFormatPrice($product_detail[0]['regular_price']) : '' ?></del>
              <input type="hidden" id="regularPrice" value="<?= $product_detail[0]['regular_price'] ?? 0 ?>">
            </div>
            <div class="product-quantity align-items-center clearfix
                d-sm-flex">
              <header class="fw-bold mb-2" style="min-width:
                  100px;">Số lượng </header>
              <div class="custom-btn-number form-inline border-0">
                <button id="decrement" type="button">
                  <i class="fa-solid fa-minus icon"></i>
                </button>
                <input type="number" name="quantity" min="1" value="1" class="form-control product_qtn" id="qtym">
                <button id="increment" type="button">
                  <i class="fa-solid fa-plus icon"></i>
                </button>
              </div>
            </div>
            <div class="product-add row mb-3 py-2">
              <div class="col-12">
                <?php if (isset($_SESSION['isLogged'])) : ?>
                  <button type="button" class="mb-lg-0 btn addToCart">
                    <i class="fa-solid fa-cart-plus icon"></i>
                    <span class="button__text">Thêm vào giỏ hàng</span>
                  </button>
                <?php else : ?>
                  <button type="button" class="mb-lg-0 btn">
                    <i class="fa-solid fa-cart-plus icon"></i>
                    <span class="button__text">Đăng nhập để mua hàng</span>
                  </button>
                <?php endif; ?>
              </div>
            </div>
            <div class="linehot_pro alert alert-warning">
              <img class="lazy loaded" alt="1900 123 321" src="<?= _PUBLIC_CLIENT ?>/images/customer-service.webp">
              <div class="b_cont fw-bold">
                <span class="d-block"> Gọi ngay <a href="tel:1900123321" title="1900 123 321">1900 123 321</a> để được tư vấn tốt nhất! </span>
              </div>
            </div>
            <div class="shopee_link">
              <a href="https://shopee.vn/" title="Mua ngay tại Shopee" class="d-block position-relative">
                <img class="lazy loaded" alt="Mua ngay tại Shopee" src="<?= _PUBLIC_CLIENT ?>/images/shopee_buy.webp">
              </a>
            </div>
          </div>
        </form>
        <div class="giftbox mb-3">
          <fieldset class="free-gifts pb-md-3">
            <legend>
              <img alt="Code Ưu Đãi" src="<?= _PUBLIC_CLIENT ?>/images/gift.webp"> Code Ưu Đãi
            </legend>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="item line_b pb-2 ">
                  <span>Nhập mã <b>MewYummy2023</b> để được giảm ngay 120k (áp dụng cho các đơn hàng trên 500k) <button class="btn btn-sm copy" data-copy="MewYummy2023" ng-click="copyText('MewYummy2023')"> Sao chép </button>
                  </span>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="item line_b pb-2 none_mb">
                  <span>Nhập mã <b>TETQUYMAO</b> để được giảm ngay 20% tổng giá trị đơn hàng. Số lượng có hạn <button class="btn btn-sm copy" data-copy="TETQUYMAO" ng-click="copyText('TETQUYMAO')"> Sao chép </button>
                  </span>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="item line_b pb-2 none_mb">
                  <span>Nhập mã <b>FREESHIP</b> để được miễn phí ship đơn hàng từ 200k <button class="btn btn-sm copy" data-copy="FREESHIP" ng-click="copyText('FREESHIP')"> Sao chép </button>
                  </span>
                </div>
              </div>
              <div class="position-absolute vmore_c w-100 d-md-none">
                <a href="javascript:;" class="d-block v_more_coupon text-center">
                  <b class="t1">Xem thêm mã ưu đãi</b>
                  <b class="t1 d-none">Thu gọn</b>
                </a>
              </div>
            </div>
          </fieldset>
        </div>
        <section class="comment-section comment">
          <?php if (isset($_SESSION['isLogged'])) : ?>
            <div class="comment__input">
              <h3 class="comment-count">Sô bình luận: <?= count($product_comment) + count($product_reply) ?></h3>
              <div class="comment__box">
                <div class="comment__box-avatar">
                  <img src="<?= _PUBLIC_UPLOADS ?>/<?= $_SESSION['avatar'] ?? '' ?>" alt="avatar">
                </div>
                <div class="comment__box-input mt-3">
                  <input type="text" class="input-main" id="commentMain" placeholder="Viết bình luận...">
                  <button type="submit" class="btn btn-primary btnSend">Gửi</button>
                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="alert alert-warning mb-4">
              Bạn phải <a class="login-comment" href="/dang-nhap">Đăng nhập</a> 
              hoặc <a class="login-comment" href="/dang-ky">Tạo tài khoản</a> để bình luận
            </div>
          <?php endif; ?>
          <div class="comment__content">
            <?php foreach ($product_comment as $cmt_main) : ?>
              <div class="comment__content-item mb-3">
                <div class="comment__main">
                  <div class="comment__main-content">
                    <div class="author-thumbnail">
                      <img src="<?= _PUBLIC_UPLOADS ?>/<?= $cmt_main['avatar'] ?>" alt="avatar">
                    </div>
                    <div class="content__main">
                      <div class="author-name">
                        <span><?= $cmt_main['fullname'] ?></span>
                        <span class="time"><?= timeAgo($cmt_main['created_at']) ?></span>
                      </div>
                      <div class="content">
                        <p><?= $cmt_main['comment'] ?></p>
                      </div>
                      <div class="content__main-reaction">
                        <div class="reaction">
                          <i class="fa-solid fa-thumbs-up icon"></i>
                          <span>Thích</span>
                        </div>
                        <div class="reaction btnResParent" data-parent-id="<?= $cmt_main['id'] ?>">
                          <i class="fa-solid fa-comment icon"></i>
                          <span>Trả lời</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if (isset($_SESSION['isLogged'])) : ?>
                  <div class="comment__box reply hide comment-parent-<?= $cmt_main['id'] ?>">
                    <div class="comment__box-avatar">
                      <img src="<?= _PUBLIC_UPLOADS ?>/<?= $_SESSION['avatar'] ?? '' ?>" alt="avatar">
                    </div>
                    <div class="comment__box-input">
                      <input type="text" class="input-main comment-input-<?= $cmt_main['id'] ?>" id="commentMain" placeholder="Viết bình luận...">
                      <button type="submit" class="btn btn-primary btnSendReply" data-comment="<?= $cmt_main['id'] ?>" data-comment-id="<?= $cmt_main['id'] ?>">Gửi</button>
                    </div>
                  </div>
                <?php endif; ?>
                <?php foreach ($product_reply as $reply) : ?>
                  <?php if ($cmt_main['id'] == $reply['comment_id']) : ?>
                    <div class="comment__replies">
                      <div class="author-thumbnail">
                        <img src="<?= _PUBLIC_UPLOADS ?>/<?= $reply['avatar'] ?>" alt="avatar">
                      </div>
                      <div class="content__main">
                        <div class="author-name">
                          <span><?= $reply['fullname'] ?></span>
                          <span class="time"><?= timeAgo($reply['created_at']) ?></span>
                        </div>
                        <div class="content">
                          <p><?= $reply['comment'] ?></p>
                        </div>
                        <div class="content__main-reaction">
                          <div class="reaction">
                            <i class="fa-solid fa-thumbs-up icon"></i>
                            <span>Thích</span>
                          </div>
                          <div class="reaction btnRes" data-id="<?= $reply['id'] ?>">
                            <i class="fa-solid fa-comment icon"></i>
                            <span>Trả lời</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php if (isset($_SESSION['isLogged'])) : ?>
                      <div class="comment__box reply comment-child comment-<?= $reply['id'] ?>">
                        <div class="comment__box-avatar">
                          <img src="<?= _PUBLIC_UPLOADS ?>/<?= $_SESSION['avatar'] ?? '' ?>" alt="avatar">
                        </div>
                        <div class="comment__box-input">
                          <input type="text" class="input-main comment-input-<?= $reply['id'] ?>" id="commentMain" placeholder="Viết bình luận...">
                          <button type="submit" class="btn btn-primary btnSendReply" data-comment="<?= $reply['id'] ?>" data-comment-id="<?= $cmt_main['id'] ?>">Gửi</button>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
      <div class="col-xl-3 col-12">
        <div class="row">
          <div class="col-xl-12 col-lg-8 col-md-6 col-sm-6 col-12">
            <div class="related-product">
              <h2 class="title mb-4"> Sản phẩm liên quan </h2>
              <div class="product-related row">
                <?php foreach ($product_relate as $relatePro) :  ?>
                  <div class="product-item mb-4 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                    <div class="row align-items-center">
                      <div class="col-4 pe-0">
                        <?php
                        if ($relatePro['sale_price'] == 0) {
                          $relatePro['sale_price'] = $relatePro['regular_price'];
                          $hideOldPrice = false;
                        } else {
                          $hideOldPrice = true;
                        }
                        $sale = 100 - ($relatePro['sale_price'] / $relatePro['regular_price'] * 100);
                        $sale = round($sale);
                        ?>
                        <?php if ($sale != 0) : ?>
                          <div class="sale-label">
                            <span class="fw-bold">- <?= $sale ?>%</span>
                          </div>
                        <?php endif; ?>
                        <a href="<?= _WEB_ROOT ?>/chi-tiet/<?= $relatePro['id'] ?>/<?= $relatePro['slug'] ?>" class="thumb" title="Ớt ngọt Đà Lạt">
                          <div class="position-relative w-100 m-0">
                            <img src="<?= _IMAGES_PRODUCT ?>/<?= $relatePro['thumbnail'] ?>" class="img lazy loaded" alt="<?= $relatePro['name'] ?>">
                          </div>
                        </a>
                      </div>
                      <div class="item-info col-7">
                        <h3 class="item-title">
                          <a class="d-block modal-open" title="<?= $relatePro['name'] ?>">
                            <?= $relatePro['name'] ?>
                          </a>
                        </h3>
                        <div class="item-price">
                          <span class="special-price fw-bold me-2"><?= numberFormatPrice($relatePro['sale_price']) ?></span>
                          <del class="old-price"><?= ($hideOldPrice) ? numberFormatPrice($relatePro['regular_price']) : '' ?></del>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="banner-pr">
              <img src="<?= _PUBLIC_CLIENT ?>/images/banner_pr.webp" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>