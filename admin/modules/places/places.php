<?php
$sql_places = "SELECT * FROM places,place_types,users WHERE places.id_place_type=place_types.id_place_type AND places.id_user=users.id_user";
$query_places = mysqli_query($mysqli, $sql_places);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Địa Điểm Xanh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nhà cung cấp</th>
                        <th>Loại địa điểm</th>
                        <th>Tên Địa điểm</th>
                        <th>Số Sao</th>
                        <th>Trạng thái</th>
                        <th>Quản lý</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nhà cung cấp</th>
                        <th>Loại địa điểm</th>
                        <th>Tên Địa điểm</th>
                        <th>Số Sao</th>
                        <th>Trạng thái</th>
                        <th>Quản lý</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query_places)) {
                    ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['placeName'] ?></td>
                            <td><?php echo $row['star'] ?></td>
                            <td>
                                <?php if ($row['status'] == 0) { ?>
                                    Đang hoạt động
                                <?php } else { ($row['status'] == 1) ?>
                                    Đã đóng cửa
                                <?php } ?>
                            </td>
                            <td>
                                <a href="index.php?action=chitietdiadiemxanh&query=xem&id=<?php echo $row['id_place'] ?>" class="btn btn-info btn-icon-split">
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