<div class="product__layout">
  <div class="container">
    <h1 class="collection-name mb-lg-3 text-uppercase"> Tất cả sản phẩm </h1>
    <div class="banner_collection mb-3 position-relative overflow-hidden">
      <div class="swiper-wrapper">
        <div class="swiper-slide text-center effect-ming swiper-slide-prev
              swiper-slide-duplicate-next" data-swiper-slide-index="0">
          <a href="/">
            <picture class="modal-open ratio1by3 aspect sitdown">
              <source media="(min-width: 1200px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_1(large).webp">
              <source media="(min-width: 992px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_1(large).webp">
              <source media="(min-width: 569px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_1(small).webp">
              <source media="(min-width: 480px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_1(small).webp">
              <img class="d-block img img-cover position-absolute" src="<?= _PUBLIC_CLIENT ?>/images/banner_collec_1(small).webp" loading="lazy" alt="MewYummy">
            </picture>
          </a>
        </div>
        <div class="swiper-slide text-center effect-ming" data-swiper-slide-index="1">
          <a href="/">
            <picture class="modal-open ratio1by3 aspect sitdown">
              <source media="(min-width: 1200px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_2(large).webp">
              <source media="(min-width: 992px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_2(large).webp">
              <source media="(min-width: 569px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_2(small).webp">
              <source media="(min-width: 480px)" srcset="<?= _PUBLIC_CLIENT ?>/images/banner_collec_2(small).webp">
              <img class="d-block img img-cover position-absolute" src="<?= _PUBLIC_CLIENT ?>/images/banner_collec_2(small).webp" loading="lazy" alt="MewYummy">
            </picture>
          </a>
        </div>
      </div>
      <div class="swiper-button-prev mbc_prev d-md-flex"></div>
      <div class="swiper-button-next mbc_next d-md-flex"></div>
    </div>
    <!-- Product Layout -->
    <div class="row">
      <div class="col-12 col-lg-3 d-none d-lg-block">
        <div class="sidebar sidebar_mobi m-0 p-2 p-lg-0 mt-lg-1 d-flex
          flex-column">
          <h2 class="title-head"> Danh mục </h2>
          <div class="list-group">
            <?php foreach ($product_cate as $cate) : ?>
              <a href="<?= linkPage($cate['id'], 'category') ?>" class="list-group-item list-group-item-action active"><?= $cate['name'] ?></a>
            <?php endforeach; ?>
          </div>
          <div class="aside-filter modal-open pr-md-2 order-lg-3">
            <div class="filter-container row">
              <aside class="aside-item filter-price mb-3 col-12 col-sm-12 col-lg-12">
                <h3 class="title-body">Lọc giá</h3>
                <form class="aside-content filter-group mb-1" action="<?= _WEB_ROOT . '/san-pham?' . urldecode($_SERVER['QUERY_STRING']) ?>" method="GET">
                  <div class="row">
                    <div class="col-6 col-lg-12 col-xl-6">
                      <label for="minPriceOffcanvas">
                        <input type="text" id="minPriceOffcanvas" name="minPrice" class="form-control filter-range-from-offcanvas" placeholder="Giá tối thiểu">
                      </label>
                    </div>
                    <div class="col-6 col-lg-12 col-xl-6">
                      <label for="maxPriceOffcanvas">
                        <?php foreach (actionPage() as $key => $value) : ?>
                          <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                        <?php endforeach; ?>
                        <input type="text" id="maxPriceOffcanvas" name="maxPrice" class="form-control filter-range-to-offcanvas" placeholder="Giá tối đa">
                      </label>
                    </div>
                  </div>
                  <button class="btn btn-primary js-filter-pricerange">Áp dụng </butt>
                </form>
              </aside>
              <aside class="aside-item filter-type mb-3 col-12 col-sm-6
                col-lg-12">
                <h3 class="title-body">Loại</h3>
                <div class="aside-content filter-group">
                  <ul class="filter-type list-unstyled m-0">
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
                  </ul>
                </div>
              </aside>
              <div class="aside-item mb-2 pt-2 order-3 d-none d-lg-block ">
                <a class="h2 title-head font-weight-bold big text-uppercase
                  d-block mb-2 p-2 rounded" href="tin-tuc"> Mẹo ăn ngon </a>
                <div class="list-blogs">
                  <article class="blog-item">
                    <div class="img_art thumb_img_blog_list">
                      <a href="#" class="effect-ming">
                        <div class="position-relative ratio3by2 rounded">
                          <img src="<?= _PUBLIC_CLIENT ?>/images/trick1.webp" loading="lazy" class="lazy d-block img img-cover
                            position-absolute rounded-3" alt="Hướng dẫn 5 cách
                            làm món cá hồi sốt vừa ngon, vừa nhiều dinh
                            dưỡng cho gia đình">
                        </div>
                      </a>
                    </div>
                    <h3 class="blog-item-name pl-3 m-0 position-relative
                      line_3">
                      <a href="#">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</a>
                    </h3>
                  </article>
                  <article class="blog-item">
                    <div class="img_art thumb_img_blog_list">
                      <a href="#" class="effect-ming">
                        <div class="position-relative ratio3by2 rounded">
                          <img src="<?= _PUBLIC_CLIENT ?>/images/trick2.webp" loading="lazy" class="lazy d-block img img-cover
                            position-absolute rounded-3" alt="Tổng hợp những
                            món ngon từ thịt bò giúp nồi cơm luôn sạch veo">
                        </div>
                      </a>
                    </div>
                    <h3 class="blog-item-name pl-3 m-0 position-relative
                      line_3">
                      <a href="#">Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo</a>
                    </h3>
                  </article>
                  <article class="blog-item">
                    <div class="img_art thumb_img_blog_list">
                      <a href="#" class="effect-ming">
                        <div class="position-relative ratio3by2 rounded">
                          <img src="<?= _PUBLIC_CLIENT ?>/images/trick3.webp" loading="lazy" class="lazy d-block img img-cover
                            position-absolute rounded-3" alt="Hướng dẫn 05 cách
                            chế biến cá bò thơm ngon hấp dẫn cho cả gia
                            đình">
                        </div>
                      </a>
                    </div>
                    <h3 class="blog-item-name pl-3 m-0 position-relative
                      line_3">
                      <a href="#">Hướng dẫn 05 cách chế biến cá bò thơm ngon hấp dẫn cho cả gia đình</a>
                    </h3>
                  </article>
                  <article class="blog-item">
                    <div class="img_art thumb_img_blog_list">
                      <a href="#" class="effect-ming">
                        <div class="position-relative ratio3by2 rounded">
                          <img src="<?= _PUBLIC_CLIENT ?>/images/trick4.webp" loading="lazy" class="lazy d-block img img-cover
                            position-absolute rounded-3" alt="TOP 30+ món thịt
                            bò ngon nhất vừa dễ làm lại tiết kiệm">
                        </div>
                      </a>
                    </div>
                    <h3 class="blog-item-name pl-3 m-0 position-relative
                      line_3">
                      <a href="#">TOP 30+ món thịt bò ngon nhất vừa dễ làm lại tiết kiệm</a>
                    </h3>
                  </article>
                  <article>
                    <div class="img_art thumb_img_blog_list">
                      <a href="#" class="effect-ming">
                        <div class="position-relative ratio3by2 rounded">
                          <img src="<?= _PUBLIC_CLIENT ?>/images/trick5.webp" loading="lazy" class="lazy d-block img img-cover
                            position-absolute rounded-3" alt="Top 16 món ăn hải
                            sản ngon nổi tiếng không nên bỏ qua">
                        </div>
                      </a>
                    </div>
                    <h3 class="blog-item-name pl-3 m-0 position-relative
                      line_3">
                      <a href="#">Top 16 món ăn hải sản ngon nổi tiếng không nên bỏ qua</a>
                    </h3>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-9 pt-3 pt-lg-0">
        <div class="sortPagiBar pt-2 pb-2 border-bottom border-top">
          <b>Sắp xếp: </b>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="sortName" value="az" <?= checkSort('ten_hh', 'asc') ?> class="form-check-input">A → Z </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="sortName" value="za" <?= checkSort('ten_hh', 'desc') ?> class="form-check-input">Z → A </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="sortPrice" value="asc" <?= checkSort('sortPrice', 'asc') ?> class="form-check-input">Giá tăng dần </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="sortPrice" value="desc" <?= checkSort('sortPrice', 'desc') ?> class="form-check-input">Giá giảm dần </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="sortTime" value="new" <?= checkSort('sortTime', 'new') ?> class="form-check-input">Mới nhất </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="sortTime" value="old" <?= checkSort('sortTime', 'old') ?> class="form-check-input">Cũ nhất </label>
          </div>
        </div>
        <div class="collection mt-4">
          <div class="category-products position-relative mt-4 mb-4">
            <div class="row slider-items">
              <?php foreach ($product_list as $pro_item) : ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3">
                  <div class="card-item">
                    <?php
                    if ($pro_item['sale_price'] == 0) {
                      $pro_item['sale_price'] = $pro_item['regular_price'];
                      $hideOldPrice = false;
                    } else {
                      $hideOldPrice = true;
                    }
                    $sale = 100 - ($pro_item['sale_price'] / $pro_item['regular_price'] * 100);
                    $sale = round($sale);
                    ?>
                    <?php if ($sale != 0) : ?>
                      <div class="sale-label sale-top-right position-absolute">
                        <span class="fw-bold">- <?= $sale ?>%</span>
                      </div>
                    <?php endif; ?>
                    <a href="/chi-tiet/<?= $pro_item['id'] ?>/<?= $pro_item['slug'] ?>" class="thumb d-block modal-open">
                      <div class="zoom">
                        <img src="<?= _IMAGES_PRODUCT ?>/<?= $pro_item['thumbnail'] ?>" loading="lazy" decoding="" class="d-block img img-cover
                        position-absolute lazy" />
                      </div>
                    </a>
                    <div class="item-info">
                      <h3 class="item-title">
                        <a class="d-block modal-open" href="#"><?= $pro_item['name'] ?></a>
                      </h3>
                      <div class="item-price">
                        <span class="special-price fw-bold me-2"><?= numberFormatPrice($pro_item['sale_price']) ?></span>
                        <del class="old-price" ng-if="product.oldPrice"><?= ($hideOldPrice) ? numberFormatPrice($pro_item['regular_price']) : '' ?></del>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <ul class="pagination">
              <li class="page-item" ng-click="firstPage()">
                <a class="page-link rounded text-center">«</a>
              </li>
              <li class="page-item" ng-click="prevPage()">
                <a class="page-link rounded text-center">‹</a>
              </li>
              <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                <li class="page-item">
                  <a href="<?= linkPage($i) ?>" class="page-link rounded text-center"><?= $i ?></a>
                </li>
              <?php endfor; ?>
              <li class="page-item" ng-click="nextPage()">
                <a class="page-link rounded text-center">›</a>
              </li>
              <li class="page-item" ng-click="lastPage()">
                <a class="page-link rounded text-center">»</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>