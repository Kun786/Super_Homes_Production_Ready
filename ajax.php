<?php
require("connection.php");

if (isset($_POST['id'])) {
	$id = $_POST["id"];

	$query = "SELECT * FROM socities WHERE cityId = '$id'";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$id = $row['id'];
		$name = $row['name'];
		echo "<option value='$id'>$name</option>";
	}
}

if (isset($_POST['sId'])) {
	$sid = $_POST["sId"];

	$query = "SELECT * FROM phases where societyId = '$sid'";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$id = $row['id'];
		$name = $row['name'];
		echo "<option value='$id'>$name</option>";
	}
}

if (isset($_POST['pId'])) {
	$pid = $_POST["pId"];

	$query = "SELECT * FROM blocks where phaseId = '$pid'";
	$fire = $conn->query($query);
	while ($row = mysqli_fetch_array($fire)) {
		$id = $row['id'];
		$name = $row['name'];
		echo "<option value='$id'>$name</option>";
	}
}
?>