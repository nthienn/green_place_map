<?php
$sql_place = "SELECT * FROM places,place_types WHERE places.id_place_type=place_types.id_place_type AND places.id_place='$_GET[idplace]'";
$query_place = mysqli_query($mysqli, $sql_place);
$sql_criteria = "SELECT * FROM places,criterias WHERE places.id_place=criterias.id_place AND places.id_place='$_GET[idplace]'";
$query_criteria = mysqli_query($mysqli, $sql_criteria);
?>

<section>
    <div class="form-information">
        <form method="POST" action="./supplier/handle.php?idplace=<?php echo $_GET['idplace'] ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <h3 class="information-heading">Địa Điểm Xanh của bạn</h3>
                    <?php
                    while ($row = mysqli_fetch_array($query_place)) {
                    ?>
                        <div class="information-group">
                            <label for="placeName" class="information-label">Tên địa điểm</label>
                            <input id="placeName" type="text" name="placeName" class="information-control" value="<?php echo $row['placeName'] ?>">
                        </div>
                        <div class="information-group">
                            <label for="address" class="information-label">Địa chỉ</label>
                            <input id="address" type="text" class="information-control" value="<?php echo $row['address'] ?>" disabled>
                        </div>
                        <div class="information-group">
                            <label for="image" class="information-label">Hình ảnh</label>
                            <input id="image" type="file" name="image" class="information-control">
                        </div>
                        <div class="information-group">
                            <label for="images" class="information-label">Hình ảnh chi tiết</label>
                            <input id="images" type="file" name="images[]" multiple="multiple" class="information-control">
                        </div>
                        <div class="information-group">
                            <label for="type" class="information-label">Loại địa điểm</label>
                            <input id="type" type="text" class="information-control" value="<?php echo $row['type'] ?>" disabled>
                        </div>
                        <div class="information-group">
                            <label for="desc" class="information-label">Mô tả</label>
                            <textarea id="desc" rows="10" cols="30" name="desc"><?php echo $row['description'] ?>"</textarea>
                        </div>
                        <div class="information-group">
                            <label for="status" class="information-label">Trạng thái</label>
                            <select name="status">
                                <?php
                                if ($row['status']==0) {
                                ?>
                                    <option value="0" selected>Đang hoạt động</option>
                                    <option value="1">Đã đóng cửa</option>
                                <?php
                                } else {
                                ?>
                                    <option value="0">Đang hoạt động</option>
                                    <option value="1" selected>Đã đóng cửa</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    }
                    ?>
                    <label for="" class="information-label">Tiêu chí</label>
                    <div class="criterias-detail">
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
                    <div class="information-action">
                        <button class="information-register" name="update">Cập nhật địa điểm</button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </form>
    </div>
</section>