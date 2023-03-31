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
				}
				else {
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
				}
				else if (error.status === 409) {
					showMessage('Đăng ký', error.responseJSON.message, 'error');
				}
				else {
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
			url: '/usercontroller/sendmail',
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
				console.log(error);
				if (error.status === 401) {
					showMessage('Quên mật khẩu', error.responseJSON.message, 'error');
				}
				else {
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
			url: '/usercontroller/resetpass/?reset=' + reset + '',
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
					showMessage('Cập nhật mật khẩu', 'Mật khẩu không khớp', 'error');
				}
				else {
					showMessage('Cập nhật mật khẩu', 'Đã có lỗi xảy ra', 'error');
				}
			},
			complete: function () {
				$('.btnResetPass').text('Cập nhật');
			}
		})
	})

	$('.search__block-input').on('input', _.debounce(function () {
		let keyword = $(this).val();
		if (keyword != '') {
			$.ajax({
				url: '/productcontroller/livesearch',
				method: 'POST',
				data: {
					keyword: keyword
				},
				dataType: 'html',
				cache: false,
				beforeSend: function () {
					$('.search__block-btn').html('<div class="spinner"></div>')
				},
				success: function (data) {
					$('.search-result-warpper').html(data);
				},
				error: function (error) {
					console.log(error);
				},
				complete: function () {
					$('.search__block-btn').html('')
				}
			})
		}
	}, 500));

	$('#avatar').on('change', function () {
		let file = $(this).prop('files')[0];
		let formData = new FormData();
		formData.append('avatar', file);
		$.ajax({
			url: '/usercontroller/uploadavatar',
			method: 'POST',
			data: formData,
			// dataType: 'json',
			contentType: false,
			processData: false,
			success: function (data) {
				showMessage('Cập nhật ảnh đại diện', 'Cập nhật ảnh đại diện thành công');
				$('.personal-figure').html(data);
			},
			error: function (error) {
				if (error.status === 401) {
					showMessage('Cập nhật ảnh đại diện', error.responseText, 'error');
				}
				else if (error.status === 415) {
					showMessage('Cập nhật ảnh đại diện', error.responseText, 'error');
				}
				else if (error.status === 500) {
					showMessage('Cập nhật ảnh đại diện', error.responseText, 'error');
				}
				else {
					showMessage('Cập nhật ảnh đại diện', 'Đã có lỗi xảy ra', 'error');
				}
			}
		})
	})

	$('.btnUpdateInfo').on('click', function (e) {
		e.preventDefault();
		const username = $('#username').val();
		const fullname = $('#fullname').val();
		const email = $('#email').val();
		const phone = $('#phone').val();
		const address = $('#address').val();
		// check phone number regex
		const regexPhone = /([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/;
		if (!regexPhone.test(phone)) {
			showMessage('Cập nhật thông tin', 'Số điện thoại không hợp lệ', 'error');
			return;
		}
		const regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (!regexEmail.test(email)) {
			showMessage('Cập nhật thông tin', 'Email không hợp lệ', 'error');
			return;
		}
		$.ajax({
			url: '/accountcontroller/updateinfo',
			method: 'POST',
			data: {
				username: username,
				fullname: fullname,
				email: email,
				phone: phone,
				address: address,
				updateInfo: true
			},
			dataType: 'json',
			cache: false,
			beforeSend: function () {
				$('.btnUpdateInfo').text('Đang cập nhật...');
			},
			success: function (data) {
				if (data.statusCode === 200) {
					showMessage('Cập nhật thông tin', data.message);
				}
			},
			error: function (error) {
				showMessage('Cập nhật thông tin', 'Đã có lỗi xảy ra', 'error');
			},
			complete: function () {
				$('.btnUpdateInfo').text('Cập nhật');
			}
		})
	})

	$('.btnChangePass').on('click', function (e) {
		e.preventDefault();
		const password = $('#password').val();
		const cfPassword = $('#cfpassword').val();
		$.ajax({
			url: '/accountcontroller/changepass',
			method: 'POST',
			data: {
				password: password,
				cfpassword: cfPassword,
				changePass: true
			},
			dataType: 'json',
			cache: false,
			beforeSend: function () {
				$('.btnChangePass').text('Đang cập nhật...');
			},
			success: function (data) {
				if (data.statusCode === 200) {
					showMessage('Cập nhật mật khẩu', data.message);
				}
			},
			error: function (error) {
				if (error.status === 400) {
					showMessage('Cập nhật mật khẩu', error.responseJSON.message, 'error');
				} else {
					showMessage('Cập nhật mật khẩu', 'Đã có lỗi xảy ra', 'error');
				}
			},
			complete: function () {
				$('.btnChangePass').text('Cập nhật');
			}
		})
	})

	$('.btnSend').on('click', function (e) {
		e.preventDefault();
		const commentMain = $('#commentMain').val();
		const url = window.location.href;
		const urlSplit = url.split('/');
		const productId = urlSplit[urlSplit.length - 2];

		$.ajax({
			url: '/productcontroller/addcomment',
			method: 'POST',
			data: {
				comment: commentMain,
				productId: productId,
				addComment: true
			},
			cache: false,
			beforeSend: function () {
				$('.btnSend').text('Đang gửi...');
			},
			success: function (data) {
				$('.comment__content').html(data);
			},
			error: function (error) {
				console.log(error);
			},
			complete: function () {
				$('.btnSend').text('Gửi');
			}
		})
	})

	$('.btnRes').each(function () {
		$(this).on('click', function (e) {
			e.preventDefault();
			const dataId = $(this).attr('data-id');
			$('.comment-' + dataId).toggleClass('hide');
		})
	})

	$('.btnResParent').each(function () {
		$(this).on('click', function (e) {
			e.preventDefault();
			const dataId = $(this).attr('data-parent-id');
			$('.comment-parent-' + dataId).toggleClass('hide');
		})
	})

	$('.btnSendReply').each(function () {
		$(this).on('click', function (e) {
			e.preventDefault();
			const dataId = $(this).attr('data-comment');
			const commentId = $(this).attr('data-comment-id');
			const commentReply = $('.comment-input-' + dataId).val();
			const url = window.location.href;
			const urlSplit = url.split('/');
			const productId = urlSplit[urlSplit.length - 2];
			console.log(commentId);

			$.ajax({
				url: '/productcontroller/addcomment',
				method: 'POST',
				data: {
					comment: commentReply,
					commentId: commentId,
					productId: productId,
					childrenId: 1, // reply
					addComment: true
				},
				cache: false,
				beforeSend: function () {
					$('.btnSendReply').text('Đang gửi...');
				},
				success: function (data) {
					console.log(data);
				},
				error: function (error) {
					console.log(error);
				},
				complete: function () {
					$('.btnSendReply').text('Gửi');
				}
			})
		})
	})
});