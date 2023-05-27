<?php
$sql_users = "SELECT * FROM users WHERE id_role=1";
$query_users = mysqli_query($mysqli, $sql_users);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Nhà Cung Cấp</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Số địa điểm</th>
                        <th>Quản lý</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Số địa điểm</th>
                        <th>Quản lý</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query_users)) {
                        $query_place = mysqli_query($mysqli, "SELECT * FROM users,places WHERE users.id_user=places.id_user AND users.id_user='$row[id_user]'");
                        $numR = mysqli_num_rows($query_place);
                    ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $numR ?></td>
                            <td>
                                <a href="./modules/users/handle.php?idsupplier=<?php echo $row['id_user'] ?>" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text font-weight-bold">Phân quyền</span>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>