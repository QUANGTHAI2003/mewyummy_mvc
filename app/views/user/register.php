<section class="wrapper">
    <div class="container">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center size">
            <form class="rounded bg-white shadow p-5" id="form" spellcheck="false" autocomplete="off">
                <div class="logo">
                    <a href="/">
                        <img src="<?= _PUBLIC_CLIENT ?>/images/logo.webp" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>
                <div class="fw-normal text-muted mb-2"> Already have an account? <a href="/dang-nhap" class="text-primary fw-bold text-decoration-none">Sign in here</a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                            <label for="floatingLastName">Name</label>
                            <small></small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Email address">
                            <label for="floatingInput">Email address</label>
                            <small></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <small></small>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="cfpassword" placeholder="Confirm Password">
                            <label for="floatingPassword">Confirm Password</label>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="other text-center text-muted text-uppercase mb-2"><span>or</span></div>
                <div class="social-account">
                    <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="<?= _PUBLIC_CLIENT ?>/images/google.png" class="img-fluid me-3">Google</a>
                    <a href="#" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="<?= _PUBLIC_CLIENT ?>/images/facebook.png" class="img-fluid me-3">Facebook</a>
                </div>
                <div class="form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                    <label class="form-check-label ms-2" for="gridCheck"> I Agree <a href="#">Terms and conditions</a>. </label>
                </div>
                <button type="submit" class="btn btn-primary submit_btn w-100 my-4" id="btnSubmit">Sign Up</button>
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