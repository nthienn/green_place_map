<?php
    include('../../config/config.php');
    if($_GET['idmember']) {
        $idmember = $_GET['idmember'];
        $sql_delete = "DELETE FROM users WHERE id_user='$idmember'";
        mysqli_query($mysqli,$sql_delete);
        header('Location:../../index.php?action=quanlythanhvien&query=xem');
    }
    if ($_GET['idsupplier']) {
        $idsupplier = $_GET['idsupplier'];
        $sql = "UPDATE users SET id_role=2 WHERE id_user='$idsupplier'";
        mysqli_query($mysqli,$sql);
        header('Location:../../index.php?action=quanlynhacungcap&query=xem');
    }  
?>