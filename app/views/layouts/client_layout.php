<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= _WEB_ROOT ?>/public/assets/client/images/favicon.ico" type="image/x-icon">
  <title><?= (!empty($page_title)) ? $page_title : 'Trang chủ website'; ?></title>
  <link href="<?= _PUBLIC_LIBS ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= _PUBLIC_LIBS ?>/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= _PUBLIC_LIBS ?>/font/fontawesome-free-6.2.1-web/css/all.min.css" />
  <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/assets/client/css/style.css">
</head>

<body>
  <?php
  use App\Core\{Controller};
  // hide if url is dang-nhap or dang-ky
  if (!hideHeaderFooter(['dang-nhap', 'dang-ky', 'quen-mat-khau', 'mat-khau-moi'])) {
    Controller::render('shared/header', $data);
  }
  Controller::render($content, $data);
  if (!hideHeaderFooter(['dang-nhap', 'dang-ky', 'quen-mat-khau', 'mat-khau-moi'])) {
    Controller::render('shared/footer', $data);
  }
  ?>
  <script type="text/javascript" src="<?= _PUBLIC_LIBS ?>/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?= _PUBLIC_LIBS ?>/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="<?= _PUBLIC_LIBS ?>/js/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/app.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/slider.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/message.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/ajax.js"></script>
  <script defer type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/lazyLoad.js"></script>
</body>
</html>