<section class="wrapper">
    <div class="container">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
            <form class="rounded bg-white shadow py-5 px-4" action="/mat-khau-moi?reset=<?= isset($_GET['reset']) ? $_GET['reset'] : '' ?>" method="POST" id="form" spellcheck="false" autocomplete="off">
                <div class="logo">
                    <a href="/">
                        <img src="<?= _PUBLIC_CLIENT ?>/images/logo.webp" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <h3 class="text-dark fw-bolder fs-4 mb-2">Đổi mật khẩu</h3>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
                    <label for="password">Mật khẩu</label>
                    <small></small>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="cfpass" placeholder="Password">
                    <label for="password">Nhập lại mật khẩu</label>
                    <small></small>
                </div>
                <button type="submit" class="btn btn-primary submit_btn w-100 my-4" name="submit" id="btnSubmit">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</section>
<script>
    form.addEventListener('keyup', function(e) {
        e.preventDefault();
        checkEmptyError([password, cfpass]);
        checkLength(password, 6, 20);
        checkLength(cfpass, 6, 20);
        checkMatchPasswordError(password, cfpass);
    })
</script>