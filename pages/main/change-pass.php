<?php
$err = [];
if (isset($_POST['convert'])) {
    $password = md5($_POST['password']);
    $password_new = md5($_POST['password_new']);
    $password_confirmation = md5($_POST['password_confirmation']);
    $sql = "SELECT * FROM users WHERE id_user='$user[id_user]' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkPass = $data['password'];
    if ($checkPass == $password) {
        if ($password_new == $password_confirmation) {
            $sql_update = "UPDATE users SET password='$password_new' WHERE id_user='$user[id_user]'";
            mysqli_query($mysqli, $sql_update);
            $alert = "<script>alert('Đổi mật khẩu thành công')</script>";
            echo $alert;
            echo "<script> window.location.href='index.php?action=profile&query=xem' </script>";
        } else {
            $err['password_confirmation'] = "Mật khẩu nhập lại không chính xác";
        }
    } else {
        $err['password'] = "Mật khẩu không chính xác";
    }
}
?>

<section>
    <div class="form-information">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h3 class="information-heading">Đổi mật khẩu</h3>
                    <div class="information-group">
                        <label for="password" class="information-label">Mật khẩu hiện tại</label>
                        <input id="password" type="password" name="password" class="information-control-pass">
                        <span class="information-message"><?php echo (isset($err['password'])) ? $err['password'] : '' ?></span>
                    </div>

                    <div class="information-group">
                        <label for="password_new" class="information-label">Mật khẩu mới</label>
                        <input id="password_new" type="password" name="password_new" class="information-control-pass">
                    </div>

                    <div class="information-group">
                        <label for="password_confirmation" class="information-label">Nhập lại mật khẩu</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="information-control-pass">
                        <span class="information-message"><?php echo (isset($err['password_confirmation'])) ? $err['password_confirmation'] : '' ?></span>
                    </div>

                    <div class="information-action">
                        <button class="information-convert" name="convert">Đổi mật khẩu</button>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div>
</section>