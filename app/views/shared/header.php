<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/san-pham">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dang-nhap">Đăng nhập</a>
                </li>
            </ul>
            <form class="d-flex my-2 my-lg-0" action="<?= _WEB_ROOT . '/san-pham?' . urldecode($_SERVER['QUERY_STRING']) ?>" method="GET">
                <?php foreach (actionPage() as $key => $value) : ?>
                        <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                <?php endforeach; ?>
                <input class="form-control me-sm-2" name="keyword" value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>