<?php
$email = $_POST["email"];
$password = $_POST["password"];

$db = mysqli_connect("127.0.0.1", "__TEAM__", "__PASSWORD__", "__TEAM__");
if(!$db) {
	echo "cannot connect to mySQL";
}

$query = "SELECT * FROM client WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($db, $query);
if(!$result) {
	echo "cannot query to mySQL";
}
$row = mysqli_fetch_assoc($result);

if($row == null) {
	echo "<p>Your password of $password was incorrect. Please try again.</p>";
} else {
	echo "<p>Sign in successful. Welcome to Comcash payment system, " . $row["name"] . "!</p>";
	session_start();
	$_SESSION["id"] = $row["id"];
}