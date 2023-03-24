<!-- Breadcrumb -->
<section class="bread__crumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
            </ol>
        </nav>
    </div>
</section>
<!-- Info Section -->
<section class="account">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="row mb-3 h-100">
                    <div class="col-12">
                        <?php include_once 'app/views/shared/menu_account.php' ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="change__pass rounded p-3 mt-4 mt-lg-0">
                    <h1 class="change__pass-title">Đổi mật khẩu</h1>
                    <form id="form" spellcheck="false" autocomplete="off">
                        <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="password" placeholder="Mật khẩu mới">
                            <label for="floatingInput">Mật khẩu mới</label>
                            <small></small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cfpassword" placeholder="Xác nhận mật khẩu mới">
                            <label for="floatingInput">Xác nhận mật khẩu mới</label>
                            <small></small>
                        </div>
                        <button type="submit" class="button btn btn-primary btnChangePass" id="btnSubmit">Đổi mật khẩu </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    form.addEventListener('keyup', function(e) {
        e.preventDefault();
        checkEmptyError([password, cfPassword]);
        checkLength(password, 6, 20);
        checkMatchPasswordError(password, cfPassword);
    })
</script>