<?php
    include('../../config/config.php');
    
    $idplace = $_GET['idplace'];
    $sql = "SELECT * FROM places WHERE id_place='$idplace' LIMIT 1";    
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('../../../supplier/uploads/'.$row['image']);
    }
    $img = mysqli_query($mysqli,"SELECT * FROM images WHERE id_place='$idplace'");
    while ($row_img = mysqli_fetch_array($img)) {
        unlink('../../../supplier/uploads/'.$row_img['image']);
    }
    mysqli_query($mysqli,"DELETE FROM images WHERE id_place='$idplace'");
    mysqli_query($mysqli,"DELETE FROM criterias WHERE id_place='$idplace'");
    $sql_delete = "DELETE FROM places WHERE id_place='$idplace'";
    mysqli_query($mysqli,$sql_delete);
    mysqli_query($mysqli,$sql_delete);
    header('Location:../../index.php?action=quanlydiadiemxanh&query=xem');
?>