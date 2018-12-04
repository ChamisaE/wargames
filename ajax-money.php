<?php
var_dump($_POST);
$clientId = $_POST["clientId"];
$cardNo = $_POST["cardNo"];
$expire = $_POST["expire"];
$security = $_POST["security"];
$zip = $_POST["zip"];

$db = mysqli_connect("127.0.0.1", "__TEAM__", "__PASSWORD__", "__TEAM__");
if(!$db) {
	echo "cannot connect to mySQL";
}

$query = "INSERT INTO card(clientId, cardNo, expire, security, zip) VALUES ($clientId, '$cardNo', '$expire', '$security', '$zip')";
if(!mysqli_query($db, $query)) {
	echo "cannot query to mySQL";
	var_dump(mysqli_error($db));
} else {
	echo "<p>Card added successfully, we now own exclusive rights to steal money from you</p>";
}
