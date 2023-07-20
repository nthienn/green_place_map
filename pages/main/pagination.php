<?php
$sql_trang = mysqli_query($mysqli, "SELECT * FROM places");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 50);
?>

<!-- Pagination -->
<ul class="pagination">
    <?php
    for ($i = 1; $i <= $trang; $i++) {
    ?>
        <li class="pagination-item">
            <a <?php if ($i == $page) {
                    echo 'style="color: #fff; background-color: rgb(87, 201, 87)"';
                } else {
                    echo '';
                }  ?> href="index.php?action=diadiemxanh&query=outstanding&trang=<?php echo $i ?>" class="pagination-item-link"><?php echo $i ?>
            </a>
        </li>
    <?php
    }
    ?>
</ul>