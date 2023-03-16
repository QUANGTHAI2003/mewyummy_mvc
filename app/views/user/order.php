<!-- Breadcrumb -->
<section class="bread__crumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
            </ol>
        </nav>
    </div>
</section>
<!-- Info Section -->
<section class="account">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="row mb-3 h-100">
                    <div class="col-12">
                        <?php include_once 'app/views/shared/menu_account.php' ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8" ng-if="isLogin">
                <nav class="mt-4 mt-lg-0">
                    <div class="nav nav-tabs nav-account" id="nav-tab" role="tablist">
                        <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" aria-controls="nav-info" aria-selected="true">
                            <img src="<?= _PUBLIC_CLIENT ?>/images/user.webp" alt="User">
                            <span class="mt-2">Thông tin tài khoản</span>
                        </button>
                        <button class="nav-link active" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders" type="button" role="tab" aria-controls="nav-orders" aria-selected="false">
                            <img src="<?= _PUBLIC_CLIENT ?>/images/orders.webp" alt="Order">
                            <span class="mt-2 position-relative"> Lịch sử đơn hàng <span class="total-order">3</span>
                            </span>
                        </button>
                    </div>
                </nav>
                <div class="tab-content nav-info" id="nav-tabContent">
                    <div class="tab-pane fade show" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab" tabindex="0">
                        <div class="account__info row mt-4 rounded">
                            <div class="account__info-image col-lg-4">
                                <div class="account-image">
                                    <img ng-src={{avatar}} alt="User">
                                </div>
                            </div>
                            <div class="account__info-content col-lg-8 mt-4 mt-lg-0">
                                <h2 class="account__info-title fw-bold">Thông tin tài khoản</h2>
                                <div class="account__detail">
                                    <div class="account__detail-item">
                                        <span class="account__detail-label">Tên đăng nhập:</span>
                                        <span class="account__detail-value">quangthai</span>
                                    </div>
                                </div>
                                <div class="account__detail">
                                    <div class="account__detail-item">
                                        <span class="account__detail-label">Họ và tên:</span>
                                        <span class="account__detail-value">Trần Quang Thái</span>
                                    </div>
                                </div>
                                <div class="account__detail">
                                    <div class="account__detail-item">
                                        <span class="account__detail-label">Email:</span>
                                        <span class="account__detail-value">tranquangthai.10102003@gmail.com</span>
                                    </div>
                                </div>
                                <div class="account__detail">
                                    <div class="account__detail-item">
                                        <span class="account__detail-label">Số điện thoại:</span>
                                        <span class="account__detail-value">0774060610</span>
                                    </div>
                                </div>
                                <div class="account__detail">
                                    <div class="account__detail-item">
                                        <span class="account__detail-label">Địa chỉ:</span>
                                        <span class="account__detail-value">Cần Thơ, Việt Nam</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab" tabindex="0">
                        <div class="order-info order-detail mt-4 p-3 rounded">
                            <div class="head-title">
                                <h1 class="title fw-bold m-0">Chi tiết đơn hàng #1040</h1>
                                <p class="note order_date m-0">Ngày tạo: 22/01/2023</p>
                                <div class="shipping_status">
                                    <b class="text-danger">Chưa giao hàng</b>
                                </div>
                            </div>
                            <div class="mt-3 border-top">
                                <div class="pt-3 pb-3 border-bottom">
                                    <h2 class="title fw-bold mb-3">Thông tin giao hàng</h2>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="m-0">Tên người nhận: </p>
                                            <p class="m-0">Quang Thái</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="m-0">Số điện thoại: </p>
                                            <p class="m-0"> +84774060610 </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-address pt-3 pb-3 border-bottom">
                                    <p class="m-0"> Địa chỉ giao hàng: </p>
                                    <p class="i_main m-0">Thị trấn Thới Lai, huyện Thới Lai, TP. Cần Thơ</p>
                                </div>
                                <div class="payment_status pt-3 pb-3 border-bottom">
                                    <p class="note m-0">Trạng thái thanh toán: </p>
                                    <span class="span_pending text-danger">Chưa thanh toán</span>
                                </div>
                            </div>
                            <div class="list-order pt-3 pb-3">
                                <p class="note m-0 fw-bold"> Danh sách sản phẩm </p>
                                <div class="item_order mt-2 mb-2 p-2 border rounded">
                                    <div class="row align-items-center">
                                        <div class="qty col-3 col-md-1 text-center fw-bold text-warning ps-1 pe-1"> 1 x </div>
                                        <div class="image_order col-2 text-center ps-1 pe-1 d-none d-md-block">
                                            <a title="Combo Như Ý" href="/combo-nhu-y">
                                                <img src="//bizweb.dktcdn.net/thumb/small/100/434/011/products/combo-nhu-y.jpg?v=1641401445810" alt="">
                                            </a>
                                        </div>
                                        <div class="content_right col-9 col-md-7 ps-1 pe-1">
                                            <a class="title_order fw-bold" href="/combo-nhu-y" title="Combo Như Ý">Combo Như Ý</a>
                                            <small class="d-block"> 1.299.000₫ </small>
                                        </div>
                                        <div class="price total col-12 col-md-2 fw-bold ps-1 pe-4"> 1.299.000₫ </div>
                                    </div>
                                </div>
                                <div class="item_order mt-2 mb-2 p-2 border rounded">
                                    <div class="row align-items-center m--1">
                                        <div class="qty col-3 col-md-1  text-center fw-bold text-warning ps-1 pe-1"> 1 x </div>
                                        <div class="image_order col-2 text-center ps-1 pe-1 d-none d-md-block">
                                            <a title="Combo Sum Vầy" href="/combo-sum-vay">
                                                <img src="//bizweb.dktcdn.net/thumb/small/100/434/011/products/sumvay1.jpg?v=1641401171510" alt="">
                                            </a>
                                        </div>
                                        <div class="content_right col-9 col-md-7 ps-1 pe-1">
                                            <a class="title_order fw-bold" href="/combo-sum-vay" title="Combo Sum Vầy">Combo Sum Vầy</a>
                                            <small class="d-block"> 799.000₫ </small>
                                        </div>
                                        <div class="price total col-12 col-md-2 fw-bold ps-1 pe-4"> 799.000₫ </div>
                                    </div>
                                </div>
                                <div class="item_order mt-2  p-2 border rounded">
                                    <div class="row align-items-center m--1">
                                        <div class="qty col-3 col-md-1  text-center fw-bold text-warning ps-1 pe-1"> 1 x </div>
                                        <div class="image_order col-2 text-center ps-1 pe-1 d-none d-md-block">
                                            <a title="Combo Cát Tường" href="/combo-cat-tuong">
                                                <img src="//bizweb.dktcdn.net/thumb/small/100/434/011/products/combo-cat-tuong.jpg?v=1641401215137" alt="">
                                            </a>
                                        </div>
                                        <div class="content_right col-9 col-md-7 ps-1 pe-1">
                                            <a class="title_order fw-bold" href="/combo-cat-tuong" title="Combo Cát Tường">Combo Cát Tường</a>
                                            <small class="d-block"> 199.000₫ </small>
                                        </div>
                                        <div class="price total col-12 col-md-2 fw-bold ps-1 pe-4"> 199.000₫ </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-order totalorders border-top">
                                <div class="border-bottom pt-2 pb-2">
                                    <div class="row m--1">
                                        <div class="col-6 ps-3 pe-1"> Mã giảm giá </div>
                                        <div class="col-6 ps-3 pe-1"> 0₫ </div>
                                    </div>
                                </div>
                                <div class="border-bottom pt-2 pb-2">
                                    <div class="row m--1">
                                        <div class="col-6 ps-3 pe-1"> Phí vận chuyển </div>
                                        <div class="col-6 ps-3 pe-1"> 0₫ (Free Ship) </div>
                                    </div>
                                </div>
                                <div class="border-bottom pt-2 pb-2">
                                    <div class="row m--1">
                                        <div class="col-6 ps-3 pe-1"> Tổng tiền </div>
                                        <div class="col-6 ps-3 pe-1">
                                            <b class="price">2.297.000₫</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-address pt-2 pb-2">
                                <b class="text-success ps-1"> Ghi chú </b>
                                <p class="note m-0 ps-1"> Không có ghi chú </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>