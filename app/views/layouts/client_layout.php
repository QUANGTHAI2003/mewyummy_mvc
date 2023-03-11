<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (!empty($page_title)) ? $page_title : 'Trang chủ website'; ?></title>
  <link href="<?= _PUBLIC_LIBS ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= _PUBLIC_LIBS ?>/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= _PUBLIC_LIBS ?>/font/fontawesome-free-6.2.1-web/css/all.min.css" />
  <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/assets/client/css/style.css">
</head>

<body>
  <?php

  use App\Core\{Controller, Session};
  // hide if url is dang-nhap or dang-ky
  if (strpos($_SERVER['REQUEST_URI'], 'dang-nhap') === false && strpos($_SERVER['REQUEST_URI'], 'dang-ky') === false) {
    Controller::render('shared/header', $data);
  }
  Controller::render($content, $data);
  if (strpos($_SERVER['REQUEST_URI'], 'dang-nhap') === false && strpos($_SERVER['REQUEST_URI'], 'dang-ky') === false) {
    Controller::render('shared/footer', $data);
  }

  ?>
  <?php if (Session::has('message')) : ?>
    <div id="toast"></div>
  <?php endif; ?>

  <script type="text/javascript" src="<?= _PUBLIC_LIBS ?>/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?= _PUBLIC_LIBS ?>/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?= _PUBLIC_LIBS ?>/js/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/app.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/slider.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/message.js"></script>
  <script defer type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/lazyLoad.js"></script>
  <?php include_once "./core/Message.php" ?>
</body>

</html>