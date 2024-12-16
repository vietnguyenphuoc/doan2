<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
// require_once _WEB_PATH_TEMPLATES . '/layout/header.php';
layouts('header');

$data = [
    'full_name' => 'Việt',
    'email' => 'alice@example.com',
    'phone_number' => '0988204187',
    'password' => '123321',
];

insert('users',$data);

?>
<div class="row">
    <div class="col-4" style="margin: 0 auto;">
        <p class="fs-2 text-center fw-bold">Đăng nhập quản lý Users</p>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="mb-3">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="" class="form-text" style="color: red;">
                Your password must be 8-20 characters long.
            </div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" type="button">Đăng nhập</button>
        </div>

    </div>
    <p class="text-center"><a href="" class="link-underline-dark">Quên mật khẩu</a></p>
    <p class="text-center"><a href="?module=auth&action=register" class="link-underline-dark">Đăng ký</a></p>
</div>
<?php
// require_once _WEB_PATH_TEMPLATES . '/layout/footer.php';
layouts('footer');
?>