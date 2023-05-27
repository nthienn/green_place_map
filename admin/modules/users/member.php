<?php
$sql_users = "SELECT * FROM users WHERE id_role=2";
$query_users = mysqli_query($mysqli, $sql_users);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Thành Viên</h1>

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
                        <th>Quản lý</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query_users)) {
                    ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td>
                                <a href="./modules/users/handle.php?idmember=<?php echo $row['id_user'] ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text font-weight-bold">Xoá tài khoản</span>
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