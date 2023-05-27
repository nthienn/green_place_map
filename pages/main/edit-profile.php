<?php
$sql_profile = "SELECT * FROM users WHERE id_user='$user[id_user]' LIMIT 1";
$query_profile = mysqli_query($mysqli, $sql_profile);
if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql_update = "UPDATE users SET name='$name',email='$email',phone='$phone',address='$address' WHERE id_user='$user[id_user]'";
    mysqli_query($mysqli,$sql_update);
    $alert = "<script>alert('Cập nhật thông tin thành công')</script>";
    echo $alert;
    echo "<script> window.location.href='index.php?action=profile&query=xem' </script>";
}
?>

<section>
    <div class="form-information">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h3 class="information-heading">Thông tin cá nhân</h3>
                    <?php
                    while ($row = mysqli_fetch_array($query_profile)) {
                    ?>
                        <div class="information-group">
                            <label for="username" class="information-label">Username</label>
                            <input id="username" type="text" value="<?php echo $row['username'] ?>" class="information-control" disabled>
                        </div>
                        <div class="information-group">
                            <label for="name" class="information-label">Họ và tên</label>
                            <input id="name" type="text" value="<?php echo $row['name'] ?>" name="name" class="information-control">
                        </div>
                        <div class="information-group">
                            <label for="email" class="information-label">Email</label>
                            <input id="email" type="text" value="<?php echo $row['email'] ?>" name="email" class="information-control">
                        </div>
                        <div class="information-group">
                            <label for="phone" class="information-label">Số điện thoại</label>
                            <input id="phone" type="text" value="<?php echo $row['phone'] ?>" name="phone" class="information-control">
                        </div>
                        <div class="information-group">
                            <label for="address" class="information-label">Địa chỉ</label>
                            <input id="address" type="text" value="<?php echo $row['address'] ?>" name="address" class="information-control">
                        </div>
                        <div class="information-action">
                            <button class="information-update" name="edit">Cập nhật thông tin</button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div>
</section>