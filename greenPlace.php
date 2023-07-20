<?php

class greenPlaceMap
{

	public $id_place;
	public $placeName;
	public $lat;
	public $lng;
	public $address;
	public $image;
	public $description;
	public $status;
	public $star;
	public $id_place_type;
	public $id_user;
	public $conn;
	public $tableName = "places";

	function setId_place($id_place)
	{
		$this->id_place = $id_place;
	}
	function getId_place()
	{
		return $this->id_place;
	}
	function setPlaceName($placeName)
	{
		$this->placeName = $placeName;
	}
	function getPlaceName()
	{
		return $this->placeName;
	}
	function setLat($lat)
	{
		$this->lat = $lat;
	}
	function getLat()
	{
		return $this->lat;
	}
	function setLng($lng)
	{
		$this->lng = $lng;
	}
	function getLng()
	{
		return $this->lng;
	}
	function setAddress($address)
	{
		$this->address = $address;
	}
	function getAddress()
	{
		return $this->address;
	}
	function setImage($image)
	{
		$this->image = $image;
	}
	function getImage()
	{
		return $this->image;
	}
	function setDescription($description)
	{
		$this->description = $description;
	}
	function getDescription()
	{
		return $this->description;
	}
	function setStatus($status)
	{
		$this->status = $status;
	}
	function getStatus()
	{
		return $this->status;
	}
	function setStar($star)
	{
		$this->star = $star;
	}
	function getStar()
	{
		return $this->star;
	}
	function setId_place_type($id_place_type)
	{
		$this->id_place_type = $id_place_type;
	}
	function getId_place_type()
	{
		return $this->id_place_type;
	}
	function setId_user($id_user)
	{
		$this->id_user = $id_user;
	}
	function getId_user()
	{
		return $this->id_user;
	}


	public function __construct()
	{
		require_once('DbConnect.php');
		$conn = new DbConnect;
		$this->conn = $conn->connect();
	}

	public function getCollegesBlankLatLng()
	{
		$sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllColleges()
	{
		$sql = "SELECT * FROM $this->tableName";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updateCollegesWithLatLng()
	{
		$sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id_place = :id_place";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':lat', $this->lat);
		$stmt->bindParam(':lng', $this->lng);
		$stmt->bindParam(':id_place', $this->id_place);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
}

class detail extends greenPlaceMap
{
	public function getColleges()
	{
		$sql = "SELECT * FROM $this->tableName WHERE id_place='$_GET[id]'";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

class coffee extends greenPlaceMap
{
	public function getColleges()
	{
		$sql = "SELECT * FROM $this->tableName WHERE id_place_type=1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

class restaurant extends greenPlaceMap
{
	public function getColleges()
	{
		$sql = "SELECT * FROM $this->tableName WHERE id_place_type=2";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

class travel extends greenPlaceMap
{
	public function getColleges()
	{
		$sql = "SELECT * FROM $this->tableName WHERE id_place_type=3";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

class search extends greenPlaceMap
{
	public function getColleges()
	{
		$tukhoa = $_POST['tukhoa'];
		$sql = "SELECT * FROM $this->tableName WHERE (places.placeName LIKE '%$tukhoa%' OR places.address LIKE '%$tukhoa%')";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

class places extends greenPlaceMap
{
	public function getColleges()
    {
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM $this->tableName WHERE id_user='$user[id_user]'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
