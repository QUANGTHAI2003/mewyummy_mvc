<!-- Breadcrumb -->
<section class="bread__crumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Câp nhật tài khoản</li>
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
                <div class="update__info rounded p-3 mt-4 mt-lg-0">
                    <h1 class="update__info-title">Cập nhật tài khoản</h1>
                    <form spellcheck="false" autocomplete="off">
                        <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="username" value="<?= $userInfo['username'] ?? '' ?>" placeholder="Username">
                                    <label for="username">Tên đăng nhập</label>
                                    <small></small>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" value="<?= $userInfo['email'] ?? '' ?>" placeholder="Email">
                                    <label for="email">Email address</label>
                                    <small></small>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullname" value="<?= $userInfo['fullname'] ?? '' ?>" placeholder="Name">
                                    <label for="name">Họ và tên</label>
                                    <small></small>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" value="<?= $userInfo['phone_number'] ?? '' ?>" placeholder="Phone">
                                    <label for="phone">Số điện thoại</label>
                                    <small></small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address" value="<?= $userInfo['address'] ?? '' ?>" placeholder="Address">
                                    <label for="address">Địa chỉ</label>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button btn btn-primary btnUpdateInfo" id="btnSubmit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>