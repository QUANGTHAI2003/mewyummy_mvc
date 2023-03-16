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
                $('.btnLogin').text('Đăng nhập');
                if (data.statusCode == 200) {
                    showMessage('Đăng nhập', data.message);
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 1000);
                } else {
                    showMessage('Đăng nhập', data.message, 'error');
                }
            },
            error: function (error) {
                showMessage('Đăng nhập', 'Đã có lỗi xảy ra', 'error');
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
                $('.btnRegister').text('Đăng ký');
                if (data.statusCode === 200) {
                    showMessage('Đăng ký', data.message);
                    setTimeout(function () {
                        window.location.href = '/dang-nhap';
                    }, 1000);
                }
            },
            error: function (error) {
                if (error.status === 401) {
                    showMessage('Đăng ký', 'Mật khẩu không khớp', 'error');
                } else if (error.status === 409) {
                    showMessage('Đăng ký', 'Email đã tồn tại', 'error');
                } else {
                    showMessage('Đăng ký', 'Đã có lỗi xảy ra', 'error');
                }
            }
        });
    })
}); 