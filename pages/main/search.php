<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 50) - 50;
}

if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql_places = "SELECT * FROM places,place_types WHERE places.id_place_type=place_types.id_place_type AND (places.placeName LIKE '%$tukhoa%' OR places.address LIKE '%$tukhoa%') ORDER BY places.star DESC LIMIT $begin,50";
$query_places = mysqli_query($mysqli, $sql_places);
?>

<section>
    <?php
    include('./pages/main/category.php');
    ?>
    <h3 class="heading">Tìm kiếm: <span><?php echo $_POST['tukhoa'] ?></span></h3>
    <div class="map" style="width:100%; height:400px; margin-bottom:32px;">
        <?php
        require 'greenPlace.php';
        $edu = new search;
        $coll = $edu->getCollegesBlankLatLng();
        $coll = json_encode($coll, true);
        echo '<div id="data">' . $coll . '</div>';

        $allData = $edu->getColleges();
        $allData = json_encode($allData, true);
        echo '<div id="allData">' . $allData . '</div>';
        ?>
        <div id="map" style="width:100%; height:100%;"></div>
    </div>
    <div class="row">
        <?php
        while ($row = mysqli_fetch_array($query_places)) {
        ?>
            <div class="col-3">
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
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    include 'pagination.php';
    ?>
</section>