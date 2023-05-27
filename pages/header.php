<?php
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    unset($_SESSION['user']);
    header('Location:index.php');
}
?>
<?php
// if (isset($_POST['query'])) {
//     $inputText = $_POST['query'];
//     $query = "SELECT * FROM places WHERE (places.placeName LIKE '%$inputText%' OR places.address LIKE '%$inputText%') ORDER BY places.star DESC";
//     $result = mysqli_query($mysqli, $query);
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_array($result)) {
//             echo '<a href="#">
//                 <img src="./supplier/uploads/' . $row['image'] . '">
//                 <div class="place-detail">
//                     <h4>' . $row['placeName'] . '</h4>
//                     <p>' . $row['address'] . '</p>
//                 </div>
//             </a>';
//         }
//     } else {
//         echo '<h3>Không tìm thấy kết quả...</h3>';
//     }
// }
?>

<div class="header">
    <div class="header__navbar">
        <div class="header__logo">
            <a href="index.php" class="header__logo-link">
                <img src="./css/img/logo.png" alt="" class="header__logo-img">
            </a>
        </div>

        <form method="POST" action="index.php?action=search&query=timkiem">
            <div class="search-box">
                <input id="search" class="search-text" type="text" placeholder="Search..." name="tukhoa">
                <button class="search-btn" name="timkiem">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <div id="search-list">
        </div>

        <ul class="header__navbar-list">
            <li class="header__navbar-item">
                <a href="index.php" class="header__navbar-item-link">
                    <i class="fa-solid fa-house header__navbar-icon"></i>
                    Trang chủ
                </a>
            </li>
            <?php
            if (isset($user['name'])) {
            ?>
                <li class="header__navbar-item">
                    <a href="index.php?action=supplier&query=register" class="header__navbar-item-link">
                        <i class="fas fa-fw fa-user-tie header__navbar-icon"></i>
                        Trở thành nhà cung cấp
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="#" class="header__navbar-item-link">
                        <i class="fa-solid fa-user header__navbar-icon"></i>
                        <?php echo $user['name'] ?>
                    </a>
                    <ul class="header__navbar-subnav">
                        <li class="header__subnav-item">
                            <a href="index.php?action=profile&query=xem" class="header__subnav-item-link">
                                <i class="fa-solid fa-user-check header__navbar-icon"></i>
                                Thông tin cá nhân
                            </a>
                        </li>
                        <?php
                        if ($user['id_role'] == 1) {
                        ?>
                            <li class="header__subnav-item">
                                <a href="index.php?action=supplier&query=places" class="header__subnav-item-link">
                                    <i class="fa-solid fa-tree header__navbar-icon"></i>
                                    Địa điểm xanh của bạn
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="header__subnav-item logout">
                            <a href="#" class="header__subnav-item-link" data-toggle="modal" data-target="#logoutModal">
                                <i class="fa-solid fa-right-from-bracket header__navbar-icon"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
            ?>
                <li class="header__navbar-item">
                    <a href="login.php" class="header__navbar-item-link">
                        <i class="fa-solid fa-right-to-bracket header__navbar-icon"></i>
                        Đăng nhập
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="login.php" class="header__navbar-item-link">
                        <i class="fa-solid fa-pen-to-square header__navbar-icon"></i>
                        Đăng ký
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng xuất?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc là muốn Đăng xuất không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                <a class="btn btn-primary" href="index.php?logout=1">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
    $(document).ready(function() {
        $('search').keyup(function() {
            var searchText = $(this).val();
            console.log(searchText);
            alert(searchText);
            if (searchText != '') {
                $.ajax({
                    url: "header.php",
                    method: "POST",
                    data: {
                        query: searchText
                    },
                    success: function(response) {
                        $('#search-list').html(response);
                    }
                });
            } else {
                $('#search-list').html("");
            }
        });
        $(document).on('click', 'a', function() {
            $('#search').val($(this).text());
            $('#search-list').html("");
        });
    });
</script> -->