<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
// require_once _WEB_PATH_TEMPLATES . '/layout/header.php';
layouts('header');
?>
<div class="row">
    <div class="col-4" style="margin: 0 auto;">
        <p class="fs-2 text-center fw-bold">Đăng ký tài khoản Users</p>
        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="email" class="form-control" id="" placeholder="Nguyễn Văn A">
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="" placeholder="name@email.com">
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="number" class="form-control" id="" placeholder="0905..........">
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" id="" class="form-control" >
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Nhập lại mật khẩu</label>
            <input type="password" id="" class="form-control" >
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" type="button">Đăng ký</button>
        </div>

    </div>
    <p class="text-center"><a href="?module=auth&action=login" class="link-underline-dark">Đã có tài khoản</a></p>
</div>
<?php
// require_once _WEB_PATH_TEMPLATES . '/layout/footer.php';
layouts('footer');
?>