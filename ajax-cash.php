<?php
$cardId = $_POST ["cardId"];
$amount = $_POST["amount"];
$confirmation = $_POST["confirmation"];


$db = mysqli_connect("127.0.0.1", "__TEAM__", "__PASSWORD__", "__TEAM__");
if(!$db) {
	echo "cannot connect to mySQL";
}

$query = "INSERT INTO payment(cardId, amount, confirmation) VALUES ('$cardId', '$amount', '$confirmation')";
if (!mysqli_query($db, $query)) {
	echo "extortion payment failed try again or face termination of service";
} else {
	echo "<p>extortion successful you can keep your internet for now</p>";
}
