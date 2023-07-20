<?php
$sql_places = "SELECT * FROM places,place_types WHERE places.id_place_type=place_types.id_place_type AND places.id_user='$user[id_user]' ORDER BY places.id_place DESC";
$query_places = mysqli_query($mysqli, $sql_places);
?>

<section>
    <?php
    include('./pages/main/category.php');
    ?>
    <h3 class="heading"><span>địa điểm xanh</span> của bạn</h3>
    <div class="map" style="width:100%; height:400px; margin-bottom:32px;">
        <?php
        require 'greenPlace.php';
        $edu = new places;
        $coll = $edu->getCollegesBlankLatLng();
        $coll = json_encode($coll, true);
        echo '<div id="data">' . $coll . '</div>';

        $allData = $edu->getColleges();
        $allData = json_encode($allData, true);
        echo '<div id="allData">' . $allData . '</div>';
        ?>
        <div id="map" style="width:100%; height:100%;"></div>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" style="font-size: 18px;">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên địa điểm</th>
                            <th>Địa chỉ</th>
                            <th>Loại địa điểm</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query_places)) {
                        ?>
                            <tr>
                                <td><img src="./supplier/uploads/<?php echo $row['image'] ?>" alt="" style="width: 100px"></td>
                                <td><?php echo $row['placeName'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['type'] ?></td>
                                <td>
                                    <a href="index.php?action=supplier&query=place-detail&id=<?php echo $row['id_place'] ?>" class="btn btn-info btn-icon-split">
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
</section>