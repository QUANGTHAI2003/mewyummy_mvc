<div class="account-action rounded h-100">
    <div class="item_acc border-bottom" ng-if="isLogin">
        <a href="/" class="active" title="Thông
                  tin tài khoản">
            <i class="fa-solid fa-user icon"></i>
            <span class="ms-3">Thông tin tài khoản</span>
        </a>
    </div>
    <div class="item_acc border-bottom" ng-if="isLogin">
        <a href="/cap-nhat" class=" d-flex w-100 align-items-center" title="Quản lý địa chỉ">
            <i class="fa-solid fa-pen-to-square icon"></i>
            <span class="ms-3">Cập nhật tài khoản</span>
        </a>
    </div>
    <div class="item_acc border-bottom" ng-if="isLogin">
        <a href="/doi-mat-khau" class=" d-flex w-100 align-items-center" title="Đổi mật khẩu">
            <i class="fa-solid fa-shuffle icon"></i>
            <span class="ms-3">Đổi mật khẩu</span>
        </a>
    </div>
    <div class="item_acc" ng-if="isLogin">
        <a class="d-flex w-100 align-items-center pe-auto" href="javascript:void(0)" ng-click="logout()" title="Đăng xuất">
            <i class="fa-solid fa-arrow-right-from-bracket icon"></i>
            <span class="ms-3">Đăng xuất</span>
        </a>
    </div>
</div>