<?php
$sql_place = "SELECT * FROM places WHERE places.id_place='$_GET[id]'";
$query_place = mysqli_query($mysqli, $sql_place);
$sql_user = "SELECT * FROM places,users WHERE places.id_user=users.id_user AND places.id_place='$_GET[id]'";
$query_user = mysqli_query($mysqli, $sql_user);
$sql_images = "SELECT * FROM images WHERE id_place='$_GET[id]'";
$query_images = mysqli_query($mysqli, $sql_images);
$sql_criteria = "SELECT * FROM places,criterias WHERE places.id_place=criterias.id_place AND places.id_place='$_GET[id]'";
$query_criteria = mysqli_query($mysqli, $sql_criteria);
$sql_user = "SELECT * FROM places,users WHERE places.id_user=users.id_user AND places.id_place='$_GET[id]'";
$query_user = mysqli_query($mysqli, $sql_user);
?>

<section>
    <?php
    include('./pages/main/category.php');
    ?>
    <?php
    while ($row = mysqli_fetch_array($query_place)) {
    ?>
        <div class="place-detail">
            <div class="row">
                <div class="col-7">
                    <h3 class="place-detail-name"><?php echo $row['placeName'] ?></h3>
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
                            <?php } else {
                                ($row['status'] == 1) ?>
                                Đã đóng cửa
                            <?php } ?>
                        </span>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-4 supplier">
                    <?php
                    while ($row_user = mysqli_fetch_array($query_user)) {
                    ?>
                        <h5>Liên hệ với Nhà cung cấp</h5>
                        <div class="supplier-name">
                            <img src="./css/img/avatar.png" alt="">
                            <p><?php echo $row_user['name'] ?></p>
                            <button class="supplier-call">
                                <i class="fa-solid fa-phone"></i>
                                <span><?php echo $row_user['phone'] ?></span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
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
            <div class="comments">
                <div class="comments-heading">
                    <h4>Bài đánh giá</h4>
                    <div class="rating">
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
                        <?php
                        $query_star = mysqli_query($mysqli, "SELECT * FROM places,ratings WHERE places.id_place=ratings.id_place AND places.id_place='$_GET[id]'");
                        $numR = mysqli_num_rows($query_star);
                        if ($row['star'] == 0) {
                        ?>
                            <span>Chưa có đánh giá</span>
                        <?php
                        } else {
                        ?>
                            <span><?php echo $row['star'] ?> (<?php echo $numR ?> lượt đánh giá)</span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <ul>
                    <?php
                    $sql_rating = "SELECT * FROM ratings,users WHERE ratings.id_user=users.id_user AND ratings.id_place='$_GET[id]' ORDER BY ratings.id_rating DESC";
                    $query_rating = mysqli_query($mysqli, $sql_rating);
                    $sql_comment = "SELECT * FROM comments,users WHERE comments.id_user=users.id_user AND comments.id_place='$_GET[id]'";
                    $query_comment = mysqli_query($mysqli, $sql_comment);
                    while ($row_rating = mysqli_fetch_array($query_rating)) {
                        if ($row_comment = mysqli_fetch_array($query_comment)) {
                    ?>
                            <li class="comment">
                                <div class="comment-user">
                                    <img src="./css/img/avatar.png" alt="">
                                    <div class="name">
                                        <p><strong><?php echo $row_comment['name'] ?></strong></p>
                                        <div class="stars">
                                            <div class="star">
                                                <?php
                                                $stars = 1;
                                                while ($stars <= 5) {
                                                    if ($row_rating['rating'] < $stars) {
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
                                            <span><?php echo $row_comment['date'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    <p><?php echo $row_comment['content'] ?></p>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <?php
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    $id_user = $user['id_user'];
                    $query_user_rating = mysqli_query($mysqli, "SELECT * FROM ratings WHERE id_user='$id_user' AND id_place='$_GET[id]'");
                    if (mysqli_num_rows($query_user_rating) > 0) {
                ?>
                        <h4>Cảm ơn bạn đã đánh giá địa điểm</h4>
                    <?php
                    } else {
                    ?>
                        <form method="POST" action="./pages/main/evaluate.php?idplace=<?php echo $row['id_place'] ?>" class="form-evaluation">
                            <h4>Viết bài đánh giá</h4>
                            <div id="rateYo"></div>
                            <input type="hidden" id="rating" name="rating">
                            <div class="comment-send">
                                <input type="text" placeholder="Để lại bình luận của bạn" name="comment">
                                <button name="send">Gửi đánh giá</button>
                            </div>
                        </form>
                    <?php
                    }
                } else {
                    ?>
                    <p class="comment-alert">
                        Vui lòng đăng nhập để gửi đánh giá
                        <a href="login.php">Đăng nhập</a>
                    </p>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</section>

<script>
    $(function() {
        $("#rateYo").rateYo({
            rating: 5,
            fullStar: true,
            onSet: function(rating) {
                $('#rating').val(rating);
            }
        })
    });
</script>