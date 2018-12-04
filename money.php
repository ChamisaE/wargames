<?php
session_start();
if(isset($_SESSION["id"])) {
	$id = $_SESSION["id"];
} else {
	$id = "";
}

$db = mysqli_connect("127.0.0.1", "__TEAM__", "__PASSWORD__", "__TEAM__");
if(!$db) {
	echo "cannot connect to mySQL";
}

$name = "";
if(isset($_GET["id"])) {
	$query = "SELECT * FROM client WHERE id = " . $_GET["id"];
	$result = mysqli_query($db, $query);
	if(!$result) {
		echo "cannot query to mySQL";
	}
	$row = mysqli_fetch_assoc($result);

	if($row != null) {
		$name = $row["name"];
	}

	$query = "SELECT * FROM card WHERE clientId = " . $_GET["id"];
	$result = mysqli_query($db, $query);
	if(!$result) {
		echo "cannot query to mySQL";
	}

	$cards = [];
	while(($row = mysqli_fetch_assoc($result)) != null) {
		$cards[] = $row;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="style.css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
				  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
				  crossorigin="anonymous"></script>