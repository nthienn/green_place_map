<?php
$sql_places = "SELECT * FROM places,place_types WHERE places.id_place_type=place_types.id_place_type ORDER BY places.star DESC LIMIT 5";
$query_places = mysqli_query($mysqli, $sql_places);
?>

<div class="map">
    <div class="outstanding-places">
        <h2 class="title">Địa điểm nổi bật gần đây</h2>
        <?php
        while ($row = mysqli_fetch_array($query_places)) {
        ?>
            <a href="index.php?action=diadiemxanh&query=chitiet&id=<?php echo $row['id_place'] ?>" class="place">
                <img src="./supplier/uploads/<?php echo $row['image'] ?>" alt="" class="place-img">
                <div class="place-info">
                    <h4 class="place-name"><?php echo $row['placeName'] ?></h4>
                    <p class="place-address"><?php echo $row['address'] ?></p>
                    <div class="place-action">
                        <div class="place-rating">
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
                        <span class="place-status">
                            <?php if ($row['status'] == 0) { ?>
                                Đang hoạt động
                            <?php } else {
                                ($row['status'] == 1) ?>
                                Đã đóng cửa
                            <?php } ?>
                        </span>
                    </div>
                    <p class="place-type">Loại địa điểm: <span><?php echo $row['type'] ?></span></p>
                </div>
            </a>
        <?php
        }
        ?>
        <a href="index.php?action=diadiemxanh&query=outstanding&trang=1" class="places-viewall">
            Xem tất cả
            <i class="fa-solid fa-angles-right"></i>
        </a>
    </div>
    <?php
    require 'greenPlace.php';
    $edu = new greenPlaceMap;
    $coll = $edu->getCollegesBlankLatLng();
    $coll = json_encode($coll, true);
    echo '<div id="data">' . $coll . '</div>';

    $allData = $edu->getAllColleges();
    $allData = json_encode($allData, true);
    echo '<div id="allData">' . $allData . '</div>';
    ?>
    <div id="map"></div>
</div>