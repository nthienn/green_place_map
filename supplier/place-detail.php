<?php
$sql_place = "SELECT * FROM places WHERE places.id_place='$_GET[id]'";
$query_place = mysqli_query($mysqli, $sql_place);
$sql_images = "SELECT * FROM images WHERE id_place='$_GET[id]'";
$query_images = mysqli_query($mysqli, $sql_images);
$sql_criteria = "SELECT * FROM places,criterias WHERE places.id_place=criterias.id_place AND places.id_place='$_GET[id]'";
$query_criteria = mysqli_query($mysqli, $sql_criteria);
?>

<section>
    <?php
    include('./pages/main/category.php');
    ?>
    <?php
    while ($row = mysqli_fetch_array($query_place)) {
    ?>
        <div class="place-detail">
            <h3 class="heading"><span>địa điểm xanh</span> của bạn</h3>
            <div class="row">
                <h3 class="col-6 place-detail-name" style="color: #717375;"><?php echo $row['placeName'] ?></h3>
                <div class="col-2"></div>
                <div class="col-4">
                    <a href="index.php?action=supplier&query=place-update&idplace=<?php echo $row['id_place'] ?>" class="btn btn-success btn-icon-split" name="browse" style="margin-left: 40px;">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text font-weight-bold">Cập Nhật Địa Điểm</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text font-weight-bold">Xoá Địa Điểm</span>
                    </a>
                </div>
            </div>
            <div class="address">
                <i class="fa-solid fa-location-dot"></i>
                <p class="place-detail-address"><?php echo $row['address'] ?></p>
            </div>
            <div class="action">
                <div class="rating">
                    <?php
                    if ($row['star'] == 0) {
                    ?>
                        <span>Chưa có đánh giá</span>
                    <?php
                    } else {
                    ?>
                        <span><?php echo $row['star'] ?></span>
                    <?php
                    }
                    ?>
                    <?php
                    $stars = 1;
                    while ($stars <= 5) {
                        if ($row['star'] < $stars) {
                    ?>
                            <i class="fa-solid fa-star" style="color: #99999980;"></i>
                        <?php
                        } else {
                        ?>
                            <i class="fa-solid fa-star" style="color: #ffce3d;"></i>
                    <?php
                        }
                        $stars++;
                    }
                    ?>
                </div>
                <span class="status">
                    <?php if ($row['status'] == 0) { ?>
                        Đang hoạt động
                    <?php } else { ?>
                        Đã đóng cửa
                    <?php } ?>
                </span>
            </div>
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
                    <img src="./supplier/uploads/<?php echo $row['image'] ?>" alt="">
                </div>
                <?php
                foreach ($query_images as $key => $value) {
                ?>
                    <div>
                        <img src="./supplier/uploads/<?php echo $value['image'] ?>" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="description">
                <h4>Mô tả</h4>
                <p><?php echo $row['description'] ?></p>
            </div>
            <div class="criterias-detail">
                <h4>Tiêu chí</h4>
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
                </div>
            </div>
        </div>
        <div class="map" style="width:100%; height:400px; margin-bottom:32px;">
            <?php
            require 'greenPlace.php';
            $edu = new detail;
            $coll = $edu->getCollegesBlankLatLng();
            $coll = json_encode($coll, true);
            echo '<div id="data">' . $coll . '</div>';

            $allData = $edu->getColleges();
            $allData = json_encode($allData, true);
            echo '<div id="allData">' . $allData . '</div>';
            ?>
            <div id="map" style="width:100%; height:100%;"></div>
        </div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xoá địa điểm?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc là muốn xoá địa điểm này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                <a href="./supplier/handle.php?idplace=<?php echo $row['id_place'] ?>" class="btn btn-danger">Xoá địa điểm</a>
            <?php
        }
            ?>
            </div>
        </div>
    </div>
</div>