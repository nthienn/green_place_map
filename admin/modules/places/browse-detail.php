<?php
$sql_browse = "SELECT * FROM browses,place_types WHERE browses.id_place_type=place_types.id_place_type AND browses.id_browse='$_GET[id]'";
$query_browse = mysqli_query($mysqli, $sql_browse);
$sql_user = "SELECT * FROM browses,users WHERE browses.id_user=users.id_user AND browses.id_browse='$_GET[id]'";
$query_user = mysqli_query($mysqli, $sql_user);
$sql_images = "SELECT * FROM browse_img WHERE id_browse='$_GET[id]'";
$query_images = mysqli_query($mysqli, $sql_images);
$sql_criteria = "SELECT * FROM browses,browse_crt WHERE browses.id_browse=browse_crt.id_browse AND browses.id_browse='$_GET[id]'";
$query_criteria = mysqli_query($mysqli, $sql_criteria);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Chi Tiết Duyệt Địa Điểm Xanh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <?php
            while ($row = mysqli_fetch_array($query_browse)) {
            ?>
                <form method="POST" action="./modules/places/handle.php?idbrowse=<?php echo $row['id_browse'] ?>" enctype="multipart/form-data">
                    <div class="action">
                        <h3 class="font-weight-bold text-primary"><?php echo $row['placeName'] ?></h3>
                        <div>
                            <button class="btn btn-success btn-icon-split" name="browse">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text font-weight-bold">Duyệt Địa Điểm</span>
                            </button>
                            <button class="btn btn-warning btn-icon-split" name="delete">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text font-weight-bold">Chưa Đủ Điều Kiện</span>
                            </button>
                        </div>
                    </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Nhà cung cấp</h4>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_user = mysqli_fetch_array($query_user)) {
                    ?>
                        <tr>
                            <td><?php echo $row_user['name'] ?></td>
                            <td><?php echo $row_user['username'] ?></td>
                            <td><?php echo $row_user['email'] ?></td>
                            <input type="hidden" name="email" value="<?php echo $row_user['email'] ?>">
                            <td><?php echo $row_user['phone'] ?></td>
                            <td><?php echo $row_user['address'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Địa điểm xanh</h4>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Loại địa điểm</th>
                        <th>Tên địa điểm</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['placeName'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Hình ảnh</h4>
            <div class="img-place">
                <div class="main">
                    <span class="control prev">
                        <i class="fas fa-fw fa-angle-left"></i>
                    </span>
                    <span class="control next">
                        <i class="fas fa-fw fa-angle-right"></i>
                    </span>
                    <div class="img-wrap">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="list-img">
                    <div>
                        <img src="../supplier/uploads/<?php echo $row['image'] ?>" alt="">
                    </div>
                    <?php
                    foreach ($query_images as $key => $value) {
                    ?>
                        <div>
                            <img src="../supplier/uploads/<?php echo $value['img'] ?>" alt="">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Mô tả</h4>
            <p><?php echo $row['description'] ?></p>
        <?php
            }
        ?>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Tiêu chí</h4>
            <div class="criterias">
                <?php
                foreach ($query_criteria as $key => $value) {
                ?>
                    <div class="criteria">
                        <i class="fas fa-check"></i>
                        <p><?php echo $value['criteria'] ?></p>
                    </div>
                <?php
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>