<?php
session_start();
include('../../admin/config/config.php');

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id_user = $user['id_user'];
    $id_place = $_GET['idplace'];
    if (isset($_POST['send'])) {
        $comment = $_POST['comment'];
        $date = date('Y-m-d');
        $rating = $_POST['rating'];
        $mysqli->query("INSERT INTO ratings(id_user,id_place,rating) VALUES ('$id_user','$id_place','$rating')");
        $sql = $mysqli->query("SELECT id_place FROM ratings WHERE id_place='$id_place'");
        $numR = $sql->num_rows;
        $sql = $mysqli->query("SELECT SUM(rating) AS total FROM ratings WHERE id_place='$id_place'");
        $rData = $sql->fetch_array();
        $total = $rData['total'];
        $avg = round(($total / $numR), 1);
        mysqli_query($mysqli, "UPDATE places SET star='$avg' WHERE id_place='$id_place'");
        mysqli_query($mysqli, "INSERT INTO comments(id_user,id_place,content,date) VALUES ('$id_user','$id_place','$comment','$date')");
        echo "<script>alert('Đánh giá thành công')</script>";
        echo "<script> window.location.href='../../index.php?action=diadiemxanh&query=chitiet&id=$id_place' </script>";
    }
}
