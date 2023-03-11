<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (!empty($page_title)) ? $page_title : 'Trang chủ website'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/assets/client/css/style.css">
</head>

<body>
  <?php
  use App\{Controller, Session};
  Controller::render('shared/header', $data);
  Controller::render($content, $data);
  Controller::render('shared/footer', $data);
  ?>
  <?php  if(Session::has('message')): ?>
    <div id="toast"></div>
  <?php endif; ?>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/app.js"></script>
  <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/message.js"></script>
  <script defer type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/client/js/lazyLoad.js"></script>
  <?php include_once "./core/Message.php" ?>
</body>

</html>