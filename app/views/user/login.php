<section class="wrapper">
    <div class="container">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
            <form class="rounded bg-white shadow py-5 px-4" action="/dang-nhap" method="POST" id="form" spellcheck="false" autocomplete="off">
                <div class="logo">
                    <a href="/">
                        <img src="<?= _PUBLIC_CLIENT ?>/images/logo.webp" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <h3 class="text-dark fw-bolder fs-4 mb-2">Đăng nhập vào Mew Yummy</h3>
                <div class="fw-normal text-muted mb-4">Chưa có tài khoản? <a href="/dang-ky" class="text-primary fw-bold">Tạo tài khoản mới</a>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Địa chỉ email</label>
                    <small></small>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
                    <label for="password">Mật khẩu</label>
                    <small></small>
                </div>
                <div class="mt-2 text-end">
                    <a href="/quen-mat-khau" class="text-primary fw-bold">Quên mật khẩu?</a>
                </div>
                <button type="submit" class="btn btn-primary submit_btn w-100 my-4" name="submit" id="btnSubmit">Đăng nhập</button>
                <div class="other text-center text-muted text-uppercase mb-3"><span>Hoặc</span></div>
                <div class="social-account">
                    <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="<?= _PUBLIC_CLIENT ?>/images/google.png" class="img-fluid me-3">
                        Google
                    </a>
                <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="<?= _PUBLIC_CLIENT ?>/images/facebook.png" class="img-fluid me-3">
                        Facebook
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    form.addEventListener('keyup', function(e) {
        e.preventDefault();
        checkEmptyError([email, password]);
        checkEmailError(email)
        checkLength(password, 6, 20);
    })
</script>