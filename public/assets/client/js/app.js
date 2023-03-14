'use strict';

// Pass name as param to url
$(document).on('change', 'input[type="radio"]', function() {
    let url = new URL(window.location.href);
    url.searchParams.set($(this).attr('name'), $(this).val());
    window.history.pushState({}, '', url);
    window.location.reload();
})

// Open and close search result
$(document).ready(function () {
    $('.search__block-input').on('click', function () {
        $('.searchResult').addClass('show');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search__block-input, .searchResult').length) {
            $('.searchResult').removeClass('show');
        }
    });

    $('.search__block-input').on('input', function () {
        $('.searchResult').toggleClass('show', this.value.length > 0);
    });

    $(document).on('click', '.open_video', function (e) {
        e.preventDefault();
        const videoId = $(this).data('video');
        $('.video-wrapper').html(`<iframe src="https://www.youtube.com/embed/${videoId}?enablejsapi=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>`);
    });

    $('.modal').on('hidden.bs.modal', function () {
        $('.video-wrapper').html('');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Change quantity by clicking on the button
    const incrementButtons = document.querySelectorAll('.custom-btn-number #increment');
    const decrementButtons = document.querySelectorAll('.custom-btn-number #decrement');

    incrementButtons.forEach(incrementButton => {
        incrementButton.addEventListener('click', function () {
            const input = this.parentNode.querySelector('input[type=number]');
            input.stepUp();
        });
    });

    decrementButtons.forEach(decrementButton => {
        decrementButton.addEventListener('click', function () {
            const input = this.parentNode.querySelector('input[type=number]');
            input.stepDown();
        });
    });

    // Copy text
    const textCopy = document.querySelectorAll('[data-copy]');
    let copyInput = document.createElement('input');

    textCopy.forEach(item => {
        item.addEventListener('click', function () {
            const copyText = this.getAttribute('data-copy');
            copyInput.value = copyText;
            document.body.appendChild(copyInput);
            copyInput.select();
            document.execCommand('copy');
            document.body.removeChild(copyInput);
            this.textContent = 'Copied!';
        });
    });


    // Format input currency
    function formatInput(e) {
        const el = e.target;
        let currency = el.value;

        if (!/^[0-9.,]+$/.test(currency)) {
            return;
        }

        clearTimeout(el.timer);

        el.timer = setTimeout(() => {
            const parts = currency.toString().split(',');
            const separator = '.';

            parts[0] = parts[0].replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, separator);
            currency = parts.join('.');

            if (e.type === 'blur') {
                currency = currency.split(',')[0];
            }
            el.value = currency;
        }, 10);
    }

    // Format price input before pass param to url
    const minPrice = document.getElementById('minPriceOffcanvas');
    const maxPrice = document.getElementById('maxPriceOffcanvas');
    const formSort = document.getElementById('formSortPrice');

    function formatPriceInput(event) {
        const input = event.target;
        input.value = input.value.replace(/\./g, '');
    }

    formSort && formSort.addEventListener('submit', () => {
        formatPriceInput({ target: minPrice });
        formatPriceInput({ target: maxPrice });
    });

    const fromInput = document.querySelector('.filter-range-from');
    const toInput = document.querySelector('.filter-range-to');
    const fromOffcanvasInput = document.querySelector('.filter-range-from-offcanvas');
    const toOffcanvasInput = document.querySelector('.filter-range-to-offcanvas');

    fromInput && fromInput.addEventListener('input', formatInput);
    toInput && toInput.addEventListener('input', formatInput);
    fromOffcanvasInput && fromOffcanvasInput.addEventListener('input', formatInput);
    toOffcanvasInput && toOffcanvasInput.addEventListener('input', formatInput);

    // Count down timer for sale
    const countDownDate = new Date("Mar 21, 2023 10:30:00").getTime();
    const day = document.querySelector('.day');
    const hour = document.querySelector('.hour');
    const minute = document.querySelector('.minute');
    const second = document.querySelector('.second');
    const hideSales = document.querySelector('.flash__sale');

    function formatTime(time) {
        return time < 10 ? `0${time}` : `${time}`;
    }

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = countDownDate - now;
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        day && (day.innerHTML = formatTime(days));
        hour && (hour.innerHTML = formatTime(hours) + "h");
        minute && (minute.innerHTML = formatTime(minutes) + "m");
        second && (second.innerHTML = formatTime(seconds) + "s");


        if (distance <= 0) {
            clearInterval(countdown);
            hideSales.style.display = 'none';
        }
    }

    const countdown = setInterval(updateCountdown, 1000);

})

// Validate form
const form = document.querySelector('#form');
const username = document.querySelector('#username');
const name = document.querySelector('#name');
const email = document.querySelector('#email');
const address = document.querySelector('#address');
const phone = document.querySelector('#phone');
const password = document.querySelector('#password');
const cfPassword = document.querySelector('#cfpassword');
const btnSubmit = document.querySelector('#btnSubmit');

function showError(input, message) {
    let parent = input.parentElement;
    let small = parent.querySelector('small');
    input.classList.remove('is-valid')
    input.classList.add('is-invalid');
    parent.classList.add('error')
    small.innerText = message;
    btnSubmit.disabled = true;
    btnSubmit.style.opacity = '0.5';
    btnSubmit.style.cursor = 'not-allowed';
}

function showSuccess(input) {
    let parent = input.parentElement;
    let small = parent.querySelector('small');
    input.classList.remove('is-invalid')
    input.classList.add('is-valid');
    parent.classList.remove('error')
    small.innerText = '';
    btnSubmit.disabled = false;
    btnSubmit.style.opacity = '1';
    btnSubmit.style.cursor = 'pointer';
}

function checkEmptyError(listInput) {
    let isRequired = false;
    listInput.forEach(function (input) {
        if (input.value.trim() === '') {
            showError(input, `Bạn chưa nhập ${getFieldName(input)}`);
            isRequired = true;
        } else {
            showSuccess(input);
        }
    });
    return isRequired;
}

function getFieldName(input) {
    // get name from label field
    return input.parentElement.querySelector('label').innerText;
}

function checkEmailError(input) {
    const regexEmail =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    input.value = input.value.trim();
    let isEmailError = !regexEmail.test(input.value);
    if (regexEmail.test(input.value)) {
        showSuccess(input);
    } else {
        showError(input, 'Email không hợp lệ');
    }
    return isEmailError;
}

function checkLength(input, min, max) {
    input.value = input.value.trim();
    if (input.value.length < min) {
        showError(input, `${getFieldName(input)} phải có ít nhất ${min} kí tự`);
        return true;
    } else if (input.value.length > max) {
        showError(input, `${getFieldName(input)} phải có ít hơn ${max} kí tự`);
        return true;
    } else {
        return false;
    }
}

function checkMatchPasswordError(passwordInput, cfPasswordInput) {
    if (passwordInput.value !== cfPasswordInput.value) {
        showError(cfPasswordInput, 'Mật khẩu không khớp');
        return true;
    } else {
        return false;
    }
}

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}