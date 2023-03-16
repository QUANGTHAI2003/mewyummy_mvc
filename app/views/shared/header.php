    <!-- Header Section -->
    <header class="header py-3">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-3 col-lg-2">
            <a href="/" class="logo">
              <img src="<?= _PUBLIC_CLIENT ?>/images/logo.webp" loading="lazy" class="img-fluid logo d-none d-lg-block" />
              <img src="<?= _PUBLIC_CLIENT ?>/images/logo_mobi.webp" loading="lazy" class="img-fluid logo d-block d-lg-none" />
            </a>
          </div>
          <div class="col-9 col-lg-10">
            <div class="d-lg-flex align-items-center position-static ps-menu">
              <div class="search__block me-3 me-xl-5">
                <form action="<?= _WEB_ROOT . '/san-pham?' . urldecode($_SERVER['QUERY_STRING']) ?>" method="GET" class="search__block-form" spellcheck="false" autocomplete="off">
                  <?php foreach (actionPage('keyword') as $key => $value) : ?>
                    <?php if (!is_array($value)) : ?>
                      <input type="hidden" name="<?= $key ?>" value="<?= formatPrice($value) ?>">
                    <?php else : ?>
                      <?php foreach (array_unique($value) as $val) : ?>
                        <input type="hidden" name="<?= $key ?>[]" value="<?= formatPrice($val) ?>">
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <input type="text" class="search__block-input form-control" name="keyword" role="search" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" spellcheck="false" autocomplete="off" placeholder="Tìm kiếm sản phẩm ..." />
                  <button type="submit" class="search__block-btn d-sm-none d-lg-block" value="">
                    <i class="fa-solid fa-magnifying-glass icon"></i>
                  </button>
                  <!-- Search Result -->
                  <div id="searchResult" class="w-100 searchResult px-2
                    mx-lg-0">
                    <div class="overflow-auto search-result-warpper">
                      <div class="d-block text-left h6 searchResult__product
                        text-white">Sản phẩm ( <span>0</span>) </div>
                      <div class="searchResult-products">
                        <!-- <div class="w-100">
                          <a href="#" title="Ba Chỉ Bò Mỹ , Short Plate (500gr)" class="d-flex align-items-start w-100 py-2
                            result-item border-bottom align-item js-link">
                            <div class="result-item_image d-flex h-100
                              align-items-center justify-content-center">
                              <img alt="Ba Chỉ Bò Mỹ , Short Plate (500gr)" src="" class="result-item_image img-fluid js-img">
                            </div>
                            <div class="result-item_detail px-2">
                              <h3 class="result-item_name mb-1 fwb js-title">Ba Chỉ Bò Mỹ , Short Plate (500gr)</h3>
                              <div class="item-price d-flex align-items-center">
                                <div class="special-price fw-bold me-2">180.000₫</div>
                                <del class="old-price">135.000₫</del>
                              </div>
                            </div>
                          </a>
                        </div> -->
                      </div>
                      <div class="d-block text-left h6 searchResult__article
                        text-white">Tin tức ( <span>0</span>) </div>
                      <div class="searchResult_articles"></div>
                      <div class="d-block text-left h6 searchResult__text
                        text-white"> Trang nội dung ( <span>0</span>) </div>
                      <div class="searchResult_pages"></div>
                      <a href="#" class="btn my-0 all-result fw-bold">Xem tất cả kết quả</a>
                    </div>
                  </div>
                </form>
              </div>
              <div class="info__block ms-2 me-2 d-none d-lg-block">
                <a href="tel:0774060610">
                  <i class="fa-solid fa-phone-volume icon icon-outline"></i>
                  <b>Hotline: <br />0774060610 </b>
                </a>
              </div>
              <div class="action__block d-none d-lg-block">
                <div class="d-lg-flex align-items-stretch">
                  <div class="action__block-login p-2 btn-account d-lg-flex
                    me-3">
                    <i class="fa-solid fa-user icon icon-outline"></i>
                    <ul class="pop__login sub__menu">
                      <?php if (isset($_SESSION['isLogged'])) :  ?>
                        <li class="pop__login-list">
                          <a href="/tai-khoan" class="pop__login-link d-block fw-bold">Tài khoản</a>
                        </li>
                        <li class="pop__login-list">
                          <a href="/dang-xuat" class="pop__login-link d-block fw-bold">Đăng xuất</a>
                        </li>
                      <?php else : ?>
                        <p><?= isset($_SESSION['user']) ? $_SESSION['user'] : '' ?></p>
                        <li class="pop__login-list">
                          <a href="/dang-nhap" class="pop__login-link d-block fw-bold">Đăng nhập</a>
                        </li>
                        <li class="pop__login-list">
                          <a href="/dang-ky" class="pop__login-link d-block fw-bold">Đăng ký</a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                  <a href="/gio-hang" class="btn-cart">
                    <span class="box-icon p-1">
                      <i class="fa-solid fa-cart-shopping icon"></i>
                    </span>
                    <span class="cart__count">
                      <?php if (isset($_SESSION['cart'])) {
                        echo count($_SESSION['cart']);
                      } else {
                        echo 0;
                      } ?>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Navbar Section -->
    <nav class="navbar me-lg-auto">
      <div class="container">
        <!-- PC Menu -->
        <ul id="menu-pc" class="p-0 m-0 position-relative d-lg-flex d-none
          d-lg-block">
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3 ps-2" href="/">Trang chủ</a>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3" href="/gioi-thieu">Về Mew Yummy</a>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2 pb-1 dropdown">
            <a class="ps-lg-3" href="/san-pham">Sản phẩm</a>
            <i class="fa-solid fa-caret-down icon"></i>
            <ul class="sub__menu">
              <div class="row px-4 py-2">
                <div class="col">
                  <li class="sub__menu-item">
                    <a href="#" class="sub__menu-link">Thịt, trứng</a>
                  </li>
                  <li class="sub__menu-item">
                    <a href="#" class="sub__menu-link">Hải sản</a>
                  </li>
                  <li class="sub__menu-item">
                    <a href="#" class="sub__menu-link">Rau củ</a>
                  </li>
                </div>
                <div class="col">
                  <li class="sub__menu-item">
                    <a href="#" class="sub__menu-link">Trái cây</a>
                  </li>
                  <li class="sub__menu-item">
                    <a href="#" class="sub__menu-link">Đồ khô</a>
                  </li>
                  <li class="sub__menu-item">
                    <a href="#" class="sub__menu-link">Gia vị</a>
                  </li>
                </div>
              </div>
            </ul>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3" href="/tin-tuc">Tin tức</a>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3" href="/lien-he">Liên hệ</a>
          </li>
          <li class="ms-auto main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3" href="#">
              <i class="fa-solid fa-map-location-dot icon"></i> Hệ thống cửa hàng </a>
          </li>
        </ul>
      </div>
      <!-- Mobile Menu -->
      <div class="container">
        <ul id="menu-mobi" class="d-lg-none">
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3 ps-2 active" href="/">
              <i class="fa-solid fa-house icon"></i>
              <span>Trang chủ</span>
            </a>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2 menu">
            <button class="ps-lg-3" data-bs-toggle="offcanvas" data-bs-target="#menuMobile" aria-controls="menuMobile">
              <i class="fa-solid fa-bars icon"></i>
              <span>Danh mục</span>
            </button>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2 dropdown">
            <button class="ps-lg-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
              <i class="fa-solid fa-sliders icon"></i>
              <span>Bộ lộc</span>
            </button>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3" href="/tai-khoan">
              <i class="fa-solid fa-user icon"></i>
              <span>Tài khoản</span>
            </a>
          </li>
          <li class="main__menu pt-lg-2 pb-lg-2">
            <a class="ps-lg-3" href="/gio-hang">
              <i class="fa-solid fa-cart-shopping icon"></i>
              <span>Giỏ hàng</span>
            </a>
          </li>
        </ul>
      </div>
      <section class="offcanvas offcanvas-start mx-3" data-bs-scroll="true" tabindex="-1" id="menuMobile" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
          <ul class="nav__mobi">
            <li class="nav__mobi-list">
              <a href="/" class="nav__mobi-link">Trang chủ</a>
            </li>
            <li class="nav__mobi-list">
              <a href="/gioi-thieu" class="nav__mobi-link">Về Mew Yummy</a>
            </li>
            <li class="nav__mobi-list active">
              <a href="/san-pham" class="nav__mobi-link">Sản phẩm</a>
            </li>
            <li class="nav__mobi-list">
              <a href="/tin-tuc" class="nav__mobi-link">Tin tức</a>
            </li>
            <li class="nav__mobi-list">
              <a href="/lien-he" class="nav__mobi-link">Liên hệ</a>
            </li>
          </ul>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
        </div>
        <div class="offcanvas-body">
          <ul class="menu__product">
            <li class="menu__product-list">
              <a href="#" class="menu__product-link me-2 ml-2">Thịt nướng</a>
            </li>
            <li class="menu__product-list">
              <a href="#" class="menu__product-link me-2 ml-2">Hải sản</a>
            </li>
            <li class="menu__product-list">
              <a href="#" class="menu__product-link me-2 ml-2">Rau củ</a>
            </li>
            <li class="menu__product-list">
              <a href="#" class="menu__product-link me-2 ml-2">Trái cầy</a>
            </li>
            <li class="menu__product-list">
              <a href="#" class="menu__product-link me-2 ml-2">Đồ khô</a>
            </li>
            <li class="menu__product-list">
              <a href="#" class="menu__product-link me-2 ml-2">Gia vị</a>
            </li>
          </ul>
        </div>
      </section>
      <div class="offcanvas offcanvas-bottom offcanvas-collapse" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-body small">
          <div class="filter-container row">
            <aside class="aside-item filter-price mb-3 col-12 col-sm-12
              col-lg-12">
              <h3 class="title-body">Lọc giá</h3>
              <!-- <form class="aside-content filter-group mb-1">
                <div class="row">
                  <div class="col-6 col-lg-12 col-xl-6">
                    <label for="minPriceOffcanvas">
                      <input type="text" id="minPriceOffcanvas" class="form-control filter-range-from-offcanvas" value="" placeholder="Giá tối thiểu">
                    </label>
                  </div>
                  <div class="col-6 col-lg-12 col-xl-6">
                    <label for="maxPriceOffcanvas">
                      <input type="text" id="maxPriceOffcanvas" class="form-control filter-range-to-offcanvas" value="" placeholder="Giá tối đa">
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary js-filter-pricerange">Áp dụng </butt>
              </form> -->
            </aside>
            <aside class="aside-item filter-type mb-3 col-12 col-md-6
              col-lg-12">
              <h3 class="title-body">Loại</h3>
              <div class="aside-content filter-group">
                <ul class="filter-type list-unstyled m-0">
                  <div class="row">
                    <div class="col-6">
                      <li class="filter-item filter-item--check-box">
                        <label data-filter="combo" for="filter-combo">
                          <input class="form-check-input mt-0" id="filter-combo" type="checkbox">
                          <i class="fa position-relative mr-2"></i> Combo </label>
                      </li>
                      <li class="filter-item filter-item--check-box">
                        <label data-filter="hải sản sống" for="filter-hai-san-song">
                          <input class="form-check-input mt-0" id="filter-hai-san-song" type="checkbox">
                          <i class="fa position-relative mr-2"></i> Hải sản sống </label>
                      </li>
                    </div>
                    <div class="col-6">
                      <li class="filter-item filter-item--check-box">
                        <label data-filter="midnight-pop mew" for="filter-midnight-pop-mew">
                          <input class="form-check-input mt-0" id="filter-midnight-pop-mew" type="checkbox">
                          <i class="fa position-relative mr-2"></i> Midnight-Pop Mew </label>
                      </li>
                      <li class="filter-item filter-item--check-box">
                        <label data-filter="thịt nhập khẩu" for="filter-thit-nhap-khau">
                          <input class="form-check-input mt-0" id="filter-thit-nhap-khau" type="checkbox">
                          <i class="fa position-relative mr-2"></i> Thịt nhập khẩu </label>
                      </li>
                    </div>
                  </div>
                </ul>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </nav>