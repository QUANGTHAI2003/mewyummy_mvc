<!-- Breadcrumb -->
<section class="bread__crumb">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./index.html">Trang chủ</a>
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
            <button class="nav-link active" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" aria-controls="nav-info" aria-selected="true">
              <img src="<?= _PUBLIC_CLIENT ?>/images/user.webp" alt="User">
              <span class="mt-2">Thông tin tài khoản</span>
            </button>
            <button class="nav-link" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders" type="button" role="tab" aria-controls="nav-orders" aria-selected="false">
              <img src="<?= _PUBLIC_CLIENT ?>/images/orders.webp" alt="Order">
              <span class="mt-2 position-relative"> Lịch sử đơn hàng <span class="total-order">3</span>
              </span>
            </button>
          </div>
        </nav>
        <div class="tab-content nav-info" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab" tabindex="0">
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
          <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab" tabindex="0">
            <div class="order__info mt-4 rounded">
              <h1 class="order__info-title">Danh sách đơn hàng</h1>
              <div class="order__info-recent">
                <div class="item-order border rounded mt-3">
                  <a href="/don-hang/1" class="row">
                    <div class="col-12 col-md-8">
                      <div class="status-order">
                        <b class="order-id">#1032</b> - <span class="span_pending
                          text-danger">Chưa thanh toán</span> - <span class="span_ text-danger">Chưa giao hàng</span>
                      </div>
                      <div class="addr_order">
                        <b> Địa chỉ giao hàng: Quận Hà Đông, Hà Nội, Vietnam </b>
                      </div>
                      <p class="time_order m-0"> Ngày: 30/12/2022 </p>
                    </div>
                    <div class="col-12 col-md-4 text-end">
                      <b class="price">105.000₫</b>
                    </div>
                  </a>
                </div>
                <div class="item-order border rounded mt-3">
                  <a href="/don-hang/2" class="row">
                    <div class="col-12 col-md-8">
                      <div class="status-order">
                        <b class="order-id">#1032</b> - <span class="span_pending
                          text-danger">Chưa thanh toán</span> - <span class="span_ text-danger">Chưa giao hàng</span>
                      </div>
                      <div class="addr_order">
                        <b> Địa chỉ giao hàng: Quận Hà Đông, Hà Nội, Vietnam </b>
                      </div>
                      <p class="time_order m-0"> Ngày: 30/12/2022 </p>
                    </div>
                    <div class="col-12 col-md-4 text-end">
                      <b class="price">105.000₫</b>
                    </div>
                  </a>
                </div>
                <div class="item-order border rounded mt-3">
                  <a href="/don-hang/3" class="row">
                    <div class="col-12 col-md-8">
                      <div class="status-order">
                        <b class="order-id">#1032</b> - <span class="span_pending
                          text-danger">Chưa thanh toán</span> - <span class="span_ text-danger">Chưa giao hàng</span>
                      </div>
                      <div class="addr_order">
                        <b> Địa chỉ giao hàng: Quận Hà Đông, Hà Nội, Vietnam </b>
                      </div>
                      <p class="time_order m-0"> Ngày: 30/12/2022 </p>
                    </div>
                    <div class="col-12 col-md-4 text-end">
                      <b class="price">105.000₫</b>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>