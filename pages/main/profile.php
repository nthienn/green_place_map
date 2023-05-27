<?php
$sql_profile = "SELECT * FROM users WHERE id_user='$user[id_user]' LIMIT 1";
$query_profile = mysqli_query($mysqli, $sql_profile);
?>

<section>
    <div class="form-information">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h3 class="information-heading">Thông tin cá nhân</h3>
                <?php
                while ($row = mysqli_fetch_array($query_profile)) {
                ?>
                    <div class="information-group">
                        <label for="username" class="information-label">Username</label>
                        <label for="username" class="information-personal"><?php echo $row['username'] ?></label>
                    </div>
                    <div class="information-group">
                        <label for="name" class="information-label">Họ và tên</label>
                        <label for="name" class="information-personal"><?php echo $row['name'] ?></label>
                    </div>
                    <div class="information-group">
                        <label for="email" class="information-label">Email</label>
                        <label for="email" class="information-personal"><?php echo $row['email'] ?></label>
                    </div>
                    <div class="information-group">
                        <label for="phone" class="information-label">Số điện thoại</label>
                        <label for="phone" class="information-personal"><?php echo $row['phone'] ?></label>
                    </div>
                    <div class="information-group">
                        <label for="address" class="information-label">Địa chỉ</label>
                        <label for="address" class="information-personal"><?php echo $row['address'] ?></label>
                    </div>
                    <div class="information-action">
                        <button class="information-update">
                            <a href="index.php?action=profile&query=sua">Cập nhật thông tin</a>
                        </button>
                        <button class="information-convert">
                            <a href="index.php?action=change-pass&query=doi">Đổi mật khẩu</a>
                        </button>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</section>