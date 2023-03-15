<section class="wrapper">
    <div class="container">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
            <form class="rounded bg-white shadow p-5" action="/quen-mat-khau" method="POST">
                <div class="logo">
                    <a href="/">
                        <img src="<?= _PUBLIC_CLIENT ?>/images/logo.webp" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <h3 class="text-dark fw-bolder fs-4 mb-2">Quên mật khẩu ?</h3>
                <div class="fw-normal text-muted mb-4">
                    Nhập email của bạn để lấy lại mật khẩu
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</section>