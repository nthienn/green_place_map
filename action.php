<?php 
	require 'greenPlace.php';
	$edu = new greenPlaceMap;
	$edu->setId_place($_REQUEST['id_place']);
	$edu->setLat($_REQUEST['lat']);
	$edu->setLng($_REQUEST['lng']);
	$status = $edu->updateCollegesWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>