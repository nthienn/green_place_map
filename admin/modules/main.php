<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if ($tam == 'duyetdiadiemxanh' && $query == 'xem') {
        include("./modules/places/browse.php");
    } else if ($tam == 'chitietduyetdiadiemxanh' && $query == 'duyet') {
        include("./modules/places/browse-detail.php");
    } else if ($tam == 'quanlydiadiemxanh' && $query == 'xem') {
        include("./modules/places/places.php");
    } else if ($tam == 'chitietdiadiemxanh' && $query == 'xem') {
        include("./modules/places/place-detail.php");
    } else if ($tam == 'quanlynhacungcap' && $query == 'xem') {
        include("./modules/users/supplier.php");
    } else if ($tam == 'quanlythanhvien' && $query == 'xem') {
        include("./modules/users/member.php");
    } else if ($tam == 'quanlybinhluan' && $query == 'xem') {
        include("./modules/comments/comment.php");
    } else {
        include("./modules/dashboard.php");
    }
    ?>

</div>
<!-- /.container-fluid -->