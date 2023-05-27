<?php
    include('../../config/config.php');
    if($_GET['idcomment']) {
        $idcomment = $_GET['idcomment'];
        $sql_delete = "DELETE FROM comments WHERE id_comment='$idcomment'";
        mysqli_query($mysqli,$sql_delete);
        header('Location:../../index.php?action=quanlybinhluan&query=xem');
    }
?>