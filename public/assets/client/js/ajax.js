$(document).ready(function () {
    /* ==================== Cart ==================== */
    // Add to cart
    const addToCartBtn = $('.addToCart');
    addToCartBtn.click(_.debounce(function () {
        let id = $('#productId').val();
        let name = $('.product-name').text();
        let image = $('.product-image').attr('src');
        let salePrice = $('#salePrice').val();
        let regularPrice = $('#regularPrice').val();
        let quantity = $('#qtym').val();

        $.ajax({
            url: '/cartcontroller/addtocart',
            method: 'POST',
            data: {
                id: id,
                name: name,
                image: image,
                salePrice: salePrice,
                regularPrice: regularPrice,
                quantity: quantity
            },
            beforeSend: function () {
                addToCartBtn.text('Đang thêm vào giỏ hàng...');
            },
            success: function (response) {
                addToCartBtn.text('Thêm vào giỏ hàng');
                showMessage('Thêm vào giỏ hàng', 'Đã thêm sản phẩm vào giỏ hàng');
            },
            error: function (error) {
                showMessage('Thêm vào giỏ hàng', 'Đã có lỗi xảy ra', 'error');
            },
        });
    }, 500));

    // Update quantity
    $('.inc').each(function () {
        $(this).click(function () {
            let id = $(this).data('id');
            $.ajax({
                url: '/cartcontroller/updateQuantity',
                method: 'POST',
                data: {
                    id: id,
                    quantity: 1
                },
                success: function (response) {
                    location.reload();
                }
            })
        })
    })

    $('.dec').each(function () {
        $(this).click(function () {
            let id = $(this).data('id');
            $.ajax({
                url: '/cartcontroller/updateQuantity',
                method: 'POST',
                data: {
                    id: id,
                    quantity: -1
                },
                success: function (response) {
                    location.reload();
                }
            })
        })
    })

    // Delete cart
    $('.deleteCartBtn').click(function () {
        let id = $(this).data('id');
        $.ajax({
            url: '/cartcontroller/deletecart',
            method: 'POST',
            data: {
                id: id
            },
            success: function (response) {
                $('.cart-' + id).remove();
                showMessage('Xóa sản phẩm', 'Đã xóa sản phẩm khỏi giỏ hàng');
            },
            error: function (error) {
                showMessage('Xóa sản phẩm', 'Đã có lỗi xảy ra', 'error');
            }
        });
    });
    /* ==================== User ==================== */
    // Login
    $('.btnLogin').on('click', function (e) {
        e.preventDefault();
        const email = $('#email').val();
        const password = $('#password').val();
        $.ajax({
            url: '/usercontroller/login',
            method: 'POST',
            data: {
                email: email,
                password: password,
                login: true
            },
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.btnLogin').text('Đang đăng nhập...');
            },
            success: function (data) {
                if (data.statusCode == 200) {
                    showMessage('Đăng nhập', data.message);
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 1000);
                }
            },
            error: function (error) {
                console.log(error);
                if (error.status === 401) {
                    showMessage('Đăng nhập', error.responseJSON.message, 'error');
                } else {
                    showMessage('Đăng nhập', 'Đã có lỗi xảy ra', 'error');
                }
            },
            complete: function () {
                $('.btnLogin').text('Đăng nhập');
            }
        });
    })

    // Register
    $('.btnRegister').on('click', function (e) {
        e.preventDefault();
        const name = $('#name').val();
        const email = $('#email').val();
        const password = $('#password').val();
        const passwordConfirm = $('#cfpassword').val();
        $.ajax({
            url: '/usercontroller/register',
            method: 'POST',
            data: {
                name: name,
                email: email,
                password: password,
                passwordConfirm: passwordConfirm,
                register: true
            },
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.btnRegister').text('Đang đăng ký...');
            },
            success: function (data) {
                if (data.statusCode === 200) {
                    showMessage('Đăng ký', data.message);
                    setTimeout(function () {
                        window.location.href = '/dang-nhap';
                    }, 1000);
                }
            },
            error: function (error) {
                if (error.status === 401) {
                    showMessage('Đăng ký', error.responseJSON.message, 'error');
                } else if (error.status === 409) {
                    showMessage('Đăng ký', error.responseJSON.message, 'error');
                } else {
                    showMessage('Đăng ký', 'Đã có lỗi xảy ra', 'error');
                }
            },
            complete: function () {
                $('.btnRegister').text('Đăng ký');
            }
        });
    })

    // Forgot password
    $('.btnSendMail').on('click', function (e) {
        e.preventDefault();
        const email = $('#email').val();
        $.ajax({
            url: '/usercontroller/sendMail',
            method: 'POST',
            data: {
                email: email,
                forgotpass: true
            },
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.btnSendMail').text('Đang gửi...');
            },
            success: function (data) {
                if (data.statusCode === 200) {
                    showMessage('Quên mật khẩu', data.message);
                }
            },
            error: function (error) {
                if (error.status === 401) {
                    showMessage('Quên mật khẩu', error.responseJSON.message, 'error');
                } else {
                    showMessage('Quên mật khẩu', 'Đã có lỗi xảy ra', 'error');
                }
            },
            complete: function () {
                $('.btnSendMail').text('Gửi');
            }
        })
    })

    // Reset password
    $('.btnResetPass').on('click', function (e) {
        e.preventDefault();
        const password = $('#password').val();
        const passwordConfirm = $('#cfpassword').val();
        const urlParams = new URLSearchParams(window.location.search);
        const reset = urlParams.get('reset');
        $.ajax({
            url: '/usercontroller/resetpass?reset=' + reset + '',
            method: 'POST',
            data: {
                password: password,
                passwordConfirm: passwordConfirm,
                reset: true
            },
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                $('.btnResetPass').text('Đang cập nhật...');
            },
            success: function (data) {
                if (data.statusCode === 200) {
                    showMessage('Cập nhật mật khẩu', data.message);
                    setTimeout(function () {
                        window.location.href = '/dang-nhap';
                    }, 1000);
                }
            },
            error: function (error) {
                if (error.status === 401) {
                    showMessage('Cập nhật mật khẩu', error.responseJSON.message, 'error');
                } else {
                    showMessage('Cập nhật mật khẩu', 'Đã có lỗi xảy ra', 'error');
                }
            },
            complete: function () {
                $('.btnResetPass').text('Cập nhật');
            }
        })
    })
}); 