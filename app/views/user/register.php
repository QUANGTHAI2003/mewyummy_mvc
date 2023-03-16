<section class="wrapper">
    <div class="container">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center size">
            <form class="rounded bg-white shadow p-5" id="form" spellcheck="false" autocomplete="off">
                <div class="logo">
                    <a href="/">
                        <img src="<?= _PUBLIC_CLIENT ?>/images/logo.webp" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <h3 class="text-dark fw-bolder fs-4 mb-2">Tạo tài khoản tại Mew Yummy</h3>
                <div class="fw-normal text-muted mb-2"> Đã có tài khoản? <a href="/dang-nhap" class="text-primary fw-bold text-decoration-none">Đăng nhập</a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                            <label for="floatingLastName">Tên đăng nhập</label>
                            <small></small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Email address">
                            <label for="floatingInput">Địa chỉ email</label>
                            <small></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="floatingPassword">Mật khẩu</label>
                            <small></small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="cfpassword" placeholder="Confirm Password">
                            <label for="floatingPassword">Xác nhận mật khẩu</label>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="other text-center text-muted text-uppercase mb-2"><span>hoặc</span></div>
                <div class="social-account">
                    <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="<?= _PUBLIC_CLIENT ?>/images/google.png" class="img-fluid me-3">Google</a>
                    <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="<?= _PUBLIC_CLIENT ?>/images/facebook.png" class="img-fluid me-3">Facebook</a>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                    <label class="form-check-label ms-2" for="gridCheck"> Tôi đồng ý với các <a href="#">điều khoản và dịch vụ</a>. </label>
                </div>
                <button type="submit" class="btn btn-primary submit_btn w-100 my-4 btnRegister" id="btnSubmit">Đăng ký</button>
            </form>
        </div>
    </div>
</section>
<script>
    form.addEventListener('keyup', function(e) {
        e.preventDefault();
        checkEmptyError([name, email, password, cfPassword]);
        checkLength(name, 6, 20);
        checkLength(password, 6, 20);
        checkEmailError(email);
        checkMatchPasswordError(password, cfPassword);
    })
</script>