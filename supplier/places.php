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
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM $this->tableName WHERE id_user='$user[id_user]'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
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