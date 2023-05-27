<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bản đồ địa điểm xanh</h1>
</div>

<div class="map" style="width:100%; height:517px;">
    <?php
    require '../greenPlace.php';
    $edu = new greenPlaceMap;
    $coll = $edu->getCollegesBlankLatLng();
    $coll = json_encode($coll, true);
    echo '<div id="data">' . $coll . '</div>';

    $allData = $edu->getAllColleges();
    $allData = json_encode($allData, true);
    echo '<div id="allData">' . $allData . '</div>';
    ?>
    <div id="map" style="width:100%; height:100%;"></div>
</div>