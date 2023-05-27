<?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    if ($tam == 'dangnhap') {
        include("./login.php");
    } else if ($tam == 'diadiemxanh' && $query == 'outstanding') {
        include("./pages/main/places-outstanding.php");
    } else if ($tam == 'diadiemxanh' && $query == 'coffee') {
        include("./pages/main/places-coffee.php");
    } else if ($tam == 'diadiemxanh' && $query == 'restaurant') {
        include("./pages/main/places-restaurant.php");
    } else if ($tam == 'diadiemxanh' && $query == 'travel') {
        include("./pages/main/places-travel.php");
    } else if ($tam == 'diadiemxanh' && $query == 'chitiet') {
        include("./pages/main/place-detail.php");
    } else if ($tam == 'search' && $query == 'timkiem') {
        include("./pages/main/search.php");
    } else if ($tam == 'profile' && $query == 'xem') {
        include("./pages/main/profile.php");
    } else if ($tam == 'profile' && $query == 'sua') {
        include("./pages/main/edit-profile.php");
    } else if ($tam == 'change-pass' && $query == 'doi') {
        include("./pages/main/change-pass.php");
    } else if ($tam == 'supplier' && $query == 'register') {
        include("./supplier/register.php");
    } else if ($tam == 'supplier' && $query == 'places') {
        include("./supplier/places.php");
    } else if ($tam == 'supplier' && $query == 'place-detail') {
        include("./supplier/place-detail.php");
    } else if ($tam == 'supplier' && $query == 'place-update') {
        include("./supplier/place-update.php");
    } else {
        include("./pages/main/index.php");
    }
?>