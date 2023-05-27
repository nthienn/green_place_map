<?php
$sql_comments = "SELECT * FROM comments,users,places WHERE comments.id_user=users.id_user AND comments.id_place=places.id_place";
$query_comments = mysqli_query($mysqli, $sql_comments);
$sql_ratings = "SELECT * FROM ratings,users,places WHERE ratings.id_user=users.id_user AND ratings.id_place=places.id_place";
$query_ratings = mysqli_query($mysqli, $sql_ratings);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Bình Luận</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Địa điểm</th>
                        <th>Bình luận</th>
                        <th>Đánh giá sao</th>
                        <th>Thời gian</th>
                        <th>Quản lý</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên</th>
                        <th>Địa điểm</th>
                        <th>Bình luận</th>
                        <th>Đánh giá sao</th>
                        <th>Thời gian</th>
                        <th>Quản lý</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query_comments)) {
                        if ($row_star = mysqli_fetch_array($query_ratings)) {
                    ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['placeName'] ?></td>
                                <td><?php echo $row['content'] ?></td>
                                <td><?php echo $row_star['rating'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                    <a href="./modules/comments/handle.php?idcomment=<?php echo $row['id_comment'] ?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text font-weight-bold">Xoá bình luận</span>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>