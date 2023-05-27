<section>
    <div class="form-information">
        <form method="POST" action="./supplier/handle.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <h3 class="information-heading">Trở thành Nhà cung cấp</h3>
                    <div class="information-group">
                        <label for="placeName" class="information-label">Tên địa điểm</label>
                        <input id="placeName" type="text" name="placeName" class="information-control">
                    </div>
                    <div class="information-group">
                        <label for="address" class="information-label">Địa chỉ</label>
                        <input id="address" type="text" name="address" class="information-control">
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
                        <select name="type" id="type">
                            <?php
                            $sql_types = "SELECT * FROM place_types ORDER BY id_place_type ASC";
                            $query_types = mysqli_query($mysqli, $sql_types);
                            while ($row_types = mysqli_fetch_array($query_types)) {
                            ?>
                                <option value="<?php echo $row_types['id_place_type'] ?>"><?php echo $row_types['type'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="information-group">
                        <label for="desc" class="information-label">Mô tả</label>
                        <textarea id="desc" rows="10" cols="30" name="desc"></textarea>
                    </div>
                    <div class="information-group">
                        <label for="" class="information-label">Địa chỉ trên map</label>
                        <div class="address-map">
                            <input id="lat" type="text" name="lat" class="information-control">
                            <input id="lng" type="text" name="lng" class="information-control">
                        </div>
                    </div>
                    <div class="map" style="width:100%; height:400px; margin-bottom:32px;">
                        <div id="address-map" style="width:100%; height:100%;"></div>
                    </div>
                    <label for="" class="information-label">Tiêu chí</label>
                    <div class="row criterias-group">
                        <div class="col-6">
                            <div class="checkbox">
                                <input id="1" value="Đảm bảo vệ sinh an toàn thực phẩm" type="checkbox" name="criteria[]">
                                <label for="1">Đảm bảo vệ sinh an toàn thực phẩm</label>
                            </div>
                            <div class="checkbox">
                                <input id="2" value="Phân loại rác thải" type="checkbox" name="criteria[]">
                                <label for="2">Phân loại rác thải</label>
                            </div>
                            <div class="checkbox">
                                <input id="3" value="Không gian sạch sẽ thoáng mát" type="checkbox" name="criteria[]">
                                <label for="3">Không gian sạch sẽ thoáng mát</label>
                            </div>
                            <div class="checkbox">
                                <input id="4" value="Chăm sóc phục vụ khách hàng nhiệt tình" type="checkbox" name="criteria[]">
                                <label for="4">Chăm sóc phục vụ khách hàng nhiệt tình</label>
                            </div>
                            <div class="checkbox">
                                <input id="5" value="Khu vực vệ sinh riêng tư, sạch sẽ" type="checkbox" name="criteria[]">
                                <label for="5">Khu vực vệ sinh riêng tư, sạch sẽ</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="checkbox">
                                <input id="6" value="Nơi đỗ xe rộng rãi" type="checkbox" name="criteria[]">
                                <label for="6">Nơi đỗ xe rộng rãi</label>
                            </div>
                            <div class="checkbox">
                                <input id="7" value="Sử dụng vật liệu thân thiện với môi trường" type="checkbox" name="criteria[]">
                                <label for="7">Sử dụng vật liệu thân thiện với môi trường</label>
                            </div>
                            <div class="checkbox">
                                <input id="8" value="An toàn vệ sinh" type="checkbox" name="criteria[]">
                                <label for="8">An toàn vệ sinh</label>
                            </div>
                            <div class="checkbox">
                                <input id="9" value="Không ô nhiễm với môi trường" type="checkbox" name="criteria[]">
                                <label for="9">Không ô nhiễm với môi trường</label>
                            </div>
                            <div class="checkbox">
                                <input id="10" value="Không ô nhiễm tiếng ồn" type="checkbox" name="criteria[]">
                                <label for="10">Không ô nhiễm tiếng ồn</label>
                            </div>
                        </div>
                    </div>

                    <div class="information-action">
                        <button class="information-register" name="register">Đăng ký xét duyệt địa điểm</button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </form>
    </div>
</section>

<script>
    var map

async function loadMap() {
    var pune = { lat: 16.0549668, lng: 108.1938618 };
    map = new google.maps.Map(document.getElementById("address-map"), {
        center: pune,
        zoom: 12
    });
    let marker = new google.maps.Marker({
        position: pune,
        map: map,
        draggable: true
    });
    google.maps.event.addListener(marker, 'position_changed',
        function () {
            let lat = marker.position.lat()
            let lng = marker.position.lng()
            $('#lat').val(lat)
            $('#lng').val(lng)
        })
    google.maps.event.addListener(map, 'click',
        function (event) {
            pos = event.latLng
            marker.setPosition(pos)
        })
  }
</script>
