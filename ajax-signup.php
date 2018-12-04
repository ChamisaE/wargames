<?php
$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];

$db = mysqli_connect("127.0.0.1", "__TEAM__", "__PASSWORD__", "__TEAM__");
if(!$db) {
	echo "cannot connect to mySQL";
}

$query = "INSERT INTO client(email, name, password) VALUES('$email', '$name', '$password')";
if(!mysqli_query($db, $query)) {
	echo "cannot query to mySQL";
}

echo "<p>Sing up successful. Welcome to Comcash payment system!</p>";
