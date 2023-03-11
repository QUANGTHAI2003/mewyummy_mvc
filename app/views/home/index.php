<section class="content">
  <section class="slider-banner container-fluid px-0">
    <div id="sliderBanner" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#sliderBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#sliderBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= _PUBLIC_CLIENT ?>/images/slide-img1.webp" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
          <img src="<?= _PUBLIC_CLIENT ?>/images/slide-img2.webp" class="d-block w-100" alt="Slide 2">
        </div>
      </div>
    </div>
  </section>
  <script>
    const sliderBanner = document.querySelector('#sliderBanner')
    const carouselBanner = new bootstrap.Carousel(sliderBanner, {
      ride: 'carousel',
      interval: 2000,
      wrap: true,
      touch: true,
    })
  </script>
</section>
<!-- Product Info Section -->
<section class="product__info">
  <div class="container productInfoSwiper overflow-hidden">
    <div class="product__info-wrapper swiper-wrapper">
      <div class="product__info-item swiper-slide mx-sm-5 pr-sm-5 mx-md-3">
        <img src="<?= _PUBLIC_CLIENT ?>/images/img_poli_1.webp" loading="lazy" />
        <div class="media-body">Sản phẩm an toàn</div>
      </div>
      <div class="product__info-item swiper-slide">
        <img src="<?= _PUBLIC_CLIENT ?>/images/img_poli_2.webp" loading="lazy" />
        <div class="media-body">Cam kết chất lượng</div>
      </div>
      <div class="product__info-item swiper-slide">
        <img src="<?= _PUBLIC_CLIENT ?>/images/img_poli_3.webp" loading="lazy" />
        <div class="media-body">Dịch vụ vượt trội</div>
      </div>
      <div class="product__info-item swiper-slide">
        <img src="<?= _PUBLIC_CLIENT ?>/images/img_poli_4.webp" loading="lazy" />
        <div class="media-body">Giao hàng nhanh chóng</div>
      </div>
    </div>
  </div>
  <div class="wave__slide bg-white">
    <img src="<?= _PUBLIC_CLIENT ?>/images/wave_down.svg" loading="lazy" />
  </div>
</section>
<!-- Categories Slider -->
<section class="cate__slide">
  <div class="container">
    <div class="rounded bg-white">
      <h3 class="title pt-lg-4 pb-lg-4">Danh mục nổi bật</h3>
      <div class="position-relative">
        <div options="swiperCateSlider" class="cate__slide-container overflow-hidden">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="box__cate row">
                <div class="child col-7 col-sm-6">
                  <a href="#">Thịt trứng</a>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Thịt Heo</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Thịt Bò</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Gà, vịt...</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Trứng các loại</a>
                  </div>
                </div>
                <div class="img__cate col-5 col-sm-6">
                  <a href="#">
                    <img class="lazy" src="<?= _PUBLIC_CLIENT ?>/images/cate1.webp" loading="lazy" />
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide swiper-slide-next">
              <div class="box__cate row">
                <div class="child col-7 col-sm-6">
                  <a href="#">Hải sản</a>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Cua</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Tôm</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Cá các loại</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Hải sản khác</a>
                  </div>
                </div>
                <div class="img__cate col-5 col-sm-6">
                  <a href="#">
                    <img class="lazy" src="<?= _PUBLIC_CLIENT ?>/images/cate2.webp" loading="lazy" />
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="box__cate row">
                <div class="child col-7 col-sm-6">
                  <a href="#">Rau củ</a>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Rau xanh đủ loại</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Củ quả tươi</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Nấm tươi các loại</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Rau thơm</a>
                  </div>
                </div>
                <div class="img__cate col-5 col-sm-6">
                  <a href="#">
                    <img class="lazy" src="<?= _PUBLIC_CLIENT ?>/images/cate3.webp" loading="lazy" />
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="box__cate row">
                <div class="child col-7 col-sm-6">
                  <a href="#">Trái cây</a>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Trái cây tươi</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Trái cây khô</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Trái cây đông lạnh</a>
                  </div>
                </div>
                <div class="img__cate col-5 col-sm-6">
                  <a href="#">
                    <img class="lazy" src="<?= _PUBLIC_CLIENT ?>/images/cate4.webp" loading="lazy" />
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="box__cate row">
                <div class="child col-7 col-sm-6">
                  <a href="#">Đồ khô</a>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Ngũ cốc 4 mùa</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Hạt dinh dưỡng</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Hoa quả sấy</a>
                  </div>
                </div>
                <div class="img__cate col-5 col-sm-6">
                  <a href="#">
                    <img class="lazy" src="<?= _PUBLIC_CLIENT ?>/images/cate5.webp" loading="lazy" />
                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="box__cate row">
                <div class="child col-7 col-sm-6">
                  <a href="#">Gia vị</a>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Muối tiêu</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Mắm các loại</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Bơ, đường, sữa</a>
                  </div>
                  <div class="childs">
                    <a href="#" class="small_tit line_1">Hạt nêm, mì chính</a>
                  </div>
                </div>
                <div class="img__cate col-5 col-sm-6">
                  <a href="#">
                    <img class="lazy" src="<?= _PUBLIC_CLIENT ?>/images/cate6.webp" loading="lazy" />
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-button-prev mc_prev swiper-button-disabled"></div>
          <div class="swiper-button-next mc_next"></div>
          <div class="swiper-pagination paginationCate"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Flash Sales -->
<section class="flash__sale" ng-controller="CountdownController" ng-hide="hideSales">
  <div class="container">
    <div class="rounded">
      <div class="time__box row">
        <div class="col-12 col-md-6">
          <h2 class="title text-center text-lg-left">
            <a class="position-relative" href="#">
              <img src="<?= _PUBLIC_CLIENT ?>/images/flash.gif" loading="lazy" /> FLASH SALE hàng tuần </a>
          </h2>
        </div>
        <div class="ml-auto col-12 col-md-6 text-end text-lg-right">
          <div class="countdown-time-wrapper pt-2 pb-3 pb-lg-2 mt-0 mt-lg-1 mb-0 mb-lg-1">
            <div class="countdown-item rod">
              <div class="countdown-time countdown-date me-1 day position-relative"></div>
              <div class="countdown-text position-relative day">Ngày</div>
            </div>
            <div class="countdown-item rods">
              <div class="countdown-time position-relative hour">00:</div>
            </div>
            <div class="countdown-item rods">
              <div class="countdown-time position-relative minute"></div>
            </div>
            <div class="countdown-item rods">
              <div class="countdown-time position-relative second"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="b_product">
            <div class="flash__slide-container overflow-hidden">
              <div class="swiper-wrapper">
                <?php foreach ($product_sale as $salePro) : ?>
                  <div class="swiper-slide swiper-slide-prev" ng-repeat="sale in productSale">
                    <div class="card-item">
                      <?php
                      if ($salePro['sale_price'] == 0) {
                        $salePro['sale_price'] = $salePro['regular_price'];
                        $hideOldPrice = false;
                      } else {
                        $hideOldPrice = true;
                      }
                      $sale = 100 - ($salePro['sale_price'] / $salePro['regular_price'] * 100);
                      $sale = round($sale);
                      ?>
                      <?php if ($sale != 0) : ?>
                        <div class="sale-label sale-top-right position-absolute">
                          <span class="fw-bold">- <?= $sale ?>%</span>
                        </div>
                      <?php endif; ?>
                      <a href="/chi-tiet/<?= $salePro['id'] ?>/<?= $salePro['slug'] ?>" class="thumb d-block modal-open">
                        <div class="zoom">
                          <img src="<?= _IMAGES_PRODUCT ?>/<?= $salePro['thumbnail'] ?>" loading="lazy" decoding="" class="d-block img img-cover
                          position-absolute lazy" alt="<?= $salePro['name'] ?>" />
                        </div>
                      </a>
                      <div class="item-info">
                        <h3 class="item-title">
                          <a class="d-block modal-open"><?= $salePro['name'] ?></a>
                        </h3>
                        <div class="item-price">
                          <span class="special-price fw-bold me-2"><?= numberFormatPrice($salePro['sale_price']) ?></span>
                          <del class="old-price" ng-if="product.oldPrice"><?= ($hideOldPrice) ? numberFormatPrice($salePro['regular_price']) : '' ?></del>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-button-prev mf_prev"></div>
              <div class="swiper-button-next mf_next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Banner -->
<section class="banner mt-4">
  <div class="container">
    <div class="image">
      <img class="rounded overflow-hidden" src="<?= _PUBLIC_CLIENT ?>/images/banner.webp" loading="lazy" />
    </div>
  </div>
</section>
<!-- Product Meat -->
<section class="product__meat">
  <div class="container">
    <h2 class="title">Thịt bò nhập khẩu</h2>
    <div class="row align-items-center">
      <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-3 mb-md-0">
        <a href="#" class="imageBanner">
          <img src="<?= _PUBLIC_CLIENT ?>/images/banner-meat.webp" loading="lazy" />
        </a>
      </div>
      <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
        <div class="b_product">
          <div class="product-container overflow-hidden">
            <div class="swiper-wrapper">
              <?php foreach ($product_meat as $meatPro) : ?>
                <div class="swiper-slide swiper-slide-prev">
                  <div class="card-item">
                    <?php
                    if ($meatPro['sale_price'] == 0) {
                      $meatPro['sale_price'] = $meatPro['regular_price'];
                      $hideOldPrice = false;
                    } else {
                      $hideOldPrice = true;
                    }
                    $sale = 100 - ($meatPro['sale_price'] / $meatPro['regular_price'] * 100);
                    $sale = round($sale);
                    ?>
                    <?php if ($sale != 0) : ?>
                      <div class="sale-label sale-top-right position-absolute">
                        <span class="fw-bold">- <?= $sale ?>%</span>
                      </div>
                    <?php endif; ?>
                    <a href="/chi-tiet/<?= $meatPro['id'] ?>/<?= $meatPro['slug'] ?>" class="thumb d-block modal-open">
                      <div class="zoom">
                        <img src="<?= _IMAGES_PRODUCT ?>/<?= $meatPro['thumbnail'] ?>" loading="lazy" class="d-block img img-cover
                        position-absolute lazy" alt="<?= $meatPro['name'] ?>" />
                      </div>
                    </a>
                    <div class="item-info">
                      <h3 class="item-title">
                        <a class="d-block modal-open" href="#"><?= $meatPro['name'] ?></a>
                      </h3>
                      <div class="item-price">
                        <span class="special-price fw-bold me-2"><?= numberFormatPrice($meatPro['sale_price']) ?></span>
                        <del class="old-price" ng-if="product.oldPrice"><?= ($hideOldPrice) ? numberFormatPrice($meatPro['regular_price']) : '' ?></del>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev mf_prev"></div>
            <div class="swiper-button-next mf_next"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Product Seafood -->
<section class="product__seafood">
  <div class="container">
    <h2 class="title">Hải sản tươi</h2>
    <div class="row align-items-center flex-sm-column-reverse flex-md-row">
      <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
        <div class="b_product">
          <div class="product-container overflow-hidden">
            <div class="swiper-wrapper">
              <?php foreach ($product_seafood as $seafoodPro) : ?>
                <div class="swiper-slide swiper-slide-prev">
                  <div class="card-item">
                    <?php
                    if ($seafoodPro['sale_price'] == 0) {
                      $seafoodPro['sale_price'] = $seafoodPro['regular_price'];
                      $hideOldPrice = false;
                    } else {
                      $hideOldPrice = true;
                    }
                    $sale = 100 - ($seafoodPro['sale_price'] / $seafoodPro['regular_price'] * 100);
                    $sale = round($sale);
                    ?>
                    <?php if ($sale != 0) : ?>
                      <div class="sale-label sale-top-right position-absolute">
                        <span class="fw-bold">- <?= $sale ?>%</span>
                      </div>
                    <?php endif; ?>
                    <a href="/chi-tiet/<?= $seafoodPro['id'] ?>/<?= $seafoodPro['slug'] ?>" class="thumb d-block modal-open">
                      <div class="zoom">
                        <img src="<?= _IMAGES_PRODUCT ?>/<?= $seafoodPro['thumbnail'] ?>" loading="lazy" class="d-block img img-cover
                        position-absolute lazy" alt="<?= $seafoodPro['name'] ?>" />
                      </div>
                    </a>
                    <div class="item-info">
                      <h3 class="item-title">
                        <a class="d-block modal-open" href="#"><?= $seafoodPro['name'] ?></a>
                      </h3>
                      <div class="item-price">
                        <span class="special-price fw-bold me-2"><?= numberFormatPrice($seafoodPro['sale_price']) ?></span>
                        <del class="old-price" ng-if="product.oldPrice"><?= ($hideOldPrice) ? numberFormatPrice($seafoodPro['regular_price']) : '' ?></del>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev mf_prev"></div>
            <div class="swiper-button-next mf_next"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-3 mb-md-0">
        <a href="#" class="imageBanner">
          <img src="<?= _PUBLIC_CLIENT ?>/images/banner-seafood.webp" loading="lazy" />
        </a>
      </div>
    </div>
  </div>
</section>
<!-- Product Vegatable -->
<section class="product__vegatable">
  <div class="container">
    <h2 class="title">Rau củ quả</h2>
    <div class="row align-items-center">
      <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-3 mb-md-0">
        <a href="#" class="imageBanner">
          <img src="<?= _PUBLIC_CLIENT ?>/images/banner-vegatable.webp" loading="lazy" />
        </a>
      </div>
      <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
        <div class="b_product">
          <div class="product-container overflow-hidden">
            <div class="swiper-wrapper">
              <?php foreach ($product_vegetable as $vegatablePro) : ?>
                <div class="swiper-slide swiper-slide-prev">
                  <div class="card-item">
                    <?php
                    if ($vegatablePro['sale_price'] == 0) {
                      $vegatablePro['sale_price'] = $vegatablePro['regular_price'];
                      $hideOldPrice = false;
                    } else {
                      $hideOldPrice = true;
                    }
                    $sale = 100 - ($vegatablePro['sale_price'] / $vegatablePro['regular_price'] * 100);
                    $sale = round($sale);
                    ?>
                    <?php if ($sale != 0) : ?>
                      <div class="sale-label sale-top-right position-absolute">
                        <span class="fw-bold">- <?= $sale ?>%</span>
                      </div>
                    <?php endif; ?>
                    <a href="/chi-tiet/<?= $vegatablePro['id'] ?>/<?= $vegatablePro['slug'] ?>" class="thumb d-block modal-open">
                      <div class="zoom">
                        <img src="<?= _IMAGES_PRODUCT ?>/<?= $vegatablePro['thumbnail'] ?>" loading="lazy" decoding="" class="d-block img img-cover
                        position-absolute lazy" alt="<?= $vegatablePro['name'] ?>" />
                      </div>
                    </a>
                    <div class="item-info">
                      <h3 class="item-title">
                        <a class="d-block modal-open" href="#"><?= $vegatablePro['name'] ?></a>
                      </h3>
                      <div class="item-price">
                        <span class="special-price fw-bold me-2"><?= numberFormatPrice($vegatablePro['sale_price']) ?></span>
                        <del class="old-price" ng-if="product.oldPrice"><?= ($hideOldPrice) ? numberFormatPrice($vegatablePro['regular_price']) : '' ?></del>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev mf_prev"></div>
            <div class="swiper-button-next mf_next"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Video -->
<section class="video">
  <div class="container">
    <h2 class="title-header">Vào bếp cùng Mew</h2>
    <div class="video-product">
      <div class="video-container position-relative overflow-hidden">
        <div class="swiper-wrapper">
          <?php foreach ($videos as $video) : ?>
            <div class="swiper-slide">
              <div class="item__video mb-3 popup_video" title="<?= $video['title'] ?>">
                <div class="item__video-thumb modal-open">
                  <a data-bs-toggle="modal" href="#videoModalToggle" role="button" data-video="<?= $video['data_video'] ?>" class="effect-ming
                  open_video">
                    <div class="ratio3by2">
                      <img src="<?= _PUBLIC_CLIENT ?>/images/<?= $video['thumbnail_video'] ?>" loading="lazy" class="d-block img
                      img-cover position-absolute lazy" />
                      <div class="video_open lazy_bg" data-video="<?= $video['data_video'] ?>"></div>
                    </div>
                  </a>
                </div>
                <div class="cont">
                  <h3 class="title fw-bold">
                    <a class="line_1"><?= $video['title'] ?></a>
                  </h3>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev mv_prev"></div>
        <div class="swiper-button-next mv_next"></div>
      </div>
    </div>
    <div class="modal fade" id="videoModalToggle" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body video-wrapper"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Blog -->
<div class="blog">
  <div class="container">
    <h2 class="title-header">Mẹo ăn ngon mỗi ngày</h2>
    <div class="b_blog">
      <div class="blog__cook-container position-relative overflow-hidden" options="swiperBlogSlider">
        <div class="swiper-wrapper">
          <?php foreach ($blogs as $blog) : ?>
            <div class="swiper-slide">
              <div class="item__blog mb-4" title="<?= $blog['title'] ?>">
                <div class="item__blog-thumb position-relative modal-open
                bor-10">
                  <a href="#" class="effect-ming">
                    <div class="position-relative w-100 m-0 be_opa modal-open
                    ratio3by2 has-edge aspect">
                      <img src="<?= _PUBLIC_CLIENT ?>/images/<?= $blog['thumbnail_blog'] ?>" loading="lazy" class="lazy d-block img img-cover position-absolute
                    " alt="Hướng dẫn 5 cách làm món cá hồi sốt vừa
                      ngon, vừa nhiều dinh dưỡng cho gia đình">
                      <div class="position-absolute w-100 h-100 overlay"></div>
                    </div>
                  </a>
                  <div class="entry-date
                  rounded-right">
                    <p class="day"><?= $blog['day'] ?></p>
                    <p class="yeah"><?= $blog['month_year'] ?></p>
                  </div>
                </div>
                <div class="cont">
                  <h3 class="title">
                    <a class="line_1"><?= $blog['title'] ?></a>
                  </h3>
                  <div class="sum line_1 line_3 h-auto"><?= $blog['desc'] ?></div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev ml_prev swiper-button-disabled"></div>
        <div class="swiper-button-next ml_next swiper-button-disabled"></div>
      </div>
    </div>
  </div>
</div>