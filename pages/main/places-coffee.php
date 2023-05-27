<?php
class greenPlace
{
    private $id_place;
    private $placeName;
    private $lat;
    private $lng;
    private $address;
    private $image;
    private $description;
    private $status;
    private $star;
    private $id_place_type;
    private $id_user;
    private $conn;
    private $tableName = "places";

    function setId_place($id_place) { $this->id_place = $id_place; }
    function getId_place() { return $this->id_place; }
    function setPlaceName($placeName) { $this->placeName = $placeName; }
    function getPlaceName() { return $this->placeName; }
    function setLat($lat) { $this->lat = $lat; }
    function getLat() { return $this->lat; }
    function setLng($lng) { $this->lng = $lng; }
    function getLng() { return $this->lng; }
    function setAddress($address) { $this->address = $address; }
    function getAddress() { return $this->address; }
    function setImage($image) { $this->image = $image; }
    function getImage() { return $this->image; }
    function setDescription($description) { $this->description = $description; }
    function getDescription() { return $this->description; }
    function setStatus($status) { $this->status = $status; }
    function getStatus() { return $this->status; }
    function setStar($star) { $this->star = $star; }
    function getStar() { return $this->star; }
    function setId_place_type($id_place_type) { $this->id_place_type = $id_place_type; }
    function getId_place_type() { return $this->id_place_type; }
    function setId_user($id_user) { $this->id_user = $id_user; }
    function getId_user() { return $this->id_user; }

    public function __construct() {
        require_once('DbConnect.php');
        $conn = new DbConnect;
        $this->conn = $conn->connect();
    }

    public function getCollegeBlankLatLng()
    {
        $sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getColleges()
    {
        $sql = "SELECT * FROM $this->tableName WHERE id_place_type=1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 20) - 20;
}
$sql_places = "SELECT * FROM places,place_types WHERE places.id_place_type=place_types.id_place_type AND places.id_place_type=1 ORDER BY places.star DESC LIMIT $begin,20";
$query_places = mysqli_query($mysqli, $sql_places);
?>

<section>
    <div class="category">
        <ul class="category-list">
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=outstanding" class="category-link">
                    <i class="fa-solid fa-fire"></i>
                    <span>Nổi bật</span>
                </a>
            </li>
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=coffee" class="category-link active">
                    <i class="fa-solid fa-mug-hot"></i>
                    <span>Quán Cafe</span>
                </a>
            </li>
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=restaurant" class="category-link">
                    <i class="fa-solid fa-utensils"></i>
                    <span>Nhà hàng</span>
                </a>
            </li>
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=travel" class="category-link">
                    <i class="fa-solid fa-umbrella-beach"></i>
                    <span>Khu du lịch</span>
                </a>
            </li>
        </ul>
    </div>
    <h3 class="heading">Danh sách <span>địa điểm xanh</span></h3>
    <div class="map" style="width:100%; height:400px; margin-bottom:32px;">
        <?php
        $edu = new greenPlace;
        $coll = $edu->getCollegeBlankLatLng();
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
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM places");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 20);
    ?>

    <!-- Pagination -->
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>
            <li class="pagination-item">
                <a <?php if ($i == $page) {
                        echo 'style="color: #fff; background-color: rgb(87, 201, 87)"';
                    } else {
                        echo '';
                    }  ?> href="index.php?action=diadiemxanh&query=outstanding&trang=<?php echo $i ?>" class="pagination-item-link"><?php echo $i ?>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</section>