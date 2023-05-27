<?php
$sql_browse = "SELECT * FROM browses,place_types,users WHERE browses.id_place_type=place_types.id_place_type AND browses.id_user=users.id_user";
$query_browse = mysqli_query($mysqli, $sql_browse);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Duyệt Địa Điểm Xanh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nhà cung cấp</th>
                        <th>Loại địa điểm</th>
                        <th>Tên địa điểm</th>
                        <th>Quản lý</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nhà cung cấp</th>
                        <th>Loại địa điểm</th>
                        <th>Tên địa điểm</th>
                        <th>Quản lý</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query_browse)) {
                    ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['placeName'] ?></td>
                            <td>
                                <a href="index.php?action=chitietduyetdiadiemxanh&query=duyet&id=<?php echo $row['id_browse'] ?>" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text font-weight-bold">Xem chi tiết</span>
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