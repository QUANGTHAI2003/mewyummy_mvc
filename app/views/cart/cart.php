<section class="bread__crumb">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./index.html">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
      </ol>
    </nav>
  </div>
</section>
<section class="cart-layout">
  <div class="container">
    <h2 ng-show="allQtn">Giỏ hàng của bạn có 1 sản phẩm</h2>
    <div class="cart-product">
      <div class="cart__item row mx-0" ng-repeat="itemCart in cart">
        <div class="cart__item-product col-lg-6">
          <div class="cart__img">
            <img src="<?= _IMAGES_PRODUCT ?>/pro7.webp" alt="{{itemCart.name}}" />
          </div>
          <div class="cart__info">
            <div class="cart__info-name">
              BẸ VAI BÒ MỸ, CHUCK FLAP (500GR)
            </div>
            <div class="cart__info-price">
              <div class="special-price">100.000đ</div>
              <del class="old-price" ng-show="itemCart.oldPrice">200.000đ</del>
            </div>
          </div>
        </div>
        <div class="cart__item-update col-lg-6 justify-content-lg-end">
          <div class="cart__item-quantity">
            <div class="product-quantity align-items-center clearfix
              d-sm-flex">
              <div class="custom-btn-number form-inline border-0">
                <button id="decrement" type="button">
                  <i class="fa-solid fa-minus icon"></i>
                </button>
                <input type="number" ng-model="quantity" name="quantity" min="1" value="1"
                  class="form-control product_qtn" id="qtym">
                <button id="increment" type="button">
                  <i class="fa-solid fa-plus icon"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="cart__total">
            <div class="cart__total-price">100.000đ</div>
            <div class="cart__total-delete btn btn-danger" ng-click="deleteCart(itemCart.id)">Xoa</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row cart__empty" ng-show="!allQtn">
      <div class="col-md-12">
        <div class="alert alert-warning" role="alert">Không có sản phẩm nào. Quay lại <a href="/san-pham"
            class="alert-link">cửa hàng</a> để tiếp tục mua sắm.</div>
      </div>
    </div>
    <div class="total-price" ng-show="allQtn">
      <div class="total-price-title">Thành tiền: </div>
      <div class="total-price-value">100.000đ</div>
    </div>
    <div class="cart__btn" ng-show="allQtn">
      <a href="/san-pham" class="btn btn-primary cart__btn-continue">Tiếp tục mua hàng</a>
      <a href="#" class="btn btn-primary cart__btn-checkout">Thanh toán</a>
    </div>
    <div class="giftbox mb-3 mt-4">
      <fieldset class="free-gifts pb-md-3">
        <legend>
          <img alt="Code Ưu Đãi" src="<?= _PUBLIC_CLIENT ?>/images/gift.webp"> Code Ưu Đãi
        </legend>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <div class="item line_b pb-2 ">
              <span>Nhập mã <b>MewYummy2023</b> để được giảm ngay 120k (áp dụng cho các đơn hàng trên 500k) <button
                  class="btn btn-sm copy" data-copy="MewYummy2023"> Sao chép </button>
              </span>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="item line_b pb-2 none_mb">
              <span>Nhập mã <b>TETQUYMAO</b> để được giảm ngay 20% tổng giá trị đơn hàng. Số lượng có hạn <button
                  class="btn btn-sm copy" data-copy="TETQUYMAO"> Sao chép </button>
              </span>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="item line_b pb-2 none_mb">
              <span>Nhập mã <b>FREESHIP</b> để được miễn phí ship đơn hàng từ 200k <button class="btn btn-sm copy"
                  data-copy="FREESHIP"> Sao chép </button>
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
  </div>
</section>