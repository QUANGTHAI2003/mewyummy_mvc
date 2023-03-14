<?php if (isset($_SESSION['message'])) : ?>
    <?php if ($_SESSION['message'] == 'registered') : ?>
        <script>
            // showMessage('Thông báo', 'Đăng ký thành công', 'success', 2000);
            alert('Đăng ký thành công')
        </script>
    <?php $_SESSION['message'] = 1; endif; ?>
<?php endif; ?>