<?php
	$card_id = $_GET['card_id'];
	$card = $_GET['card'];
	$date = $_GET['date'];
	$task = $_GET['task'];
	$price_add = $_GET['price_add'];
	
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "INSERT INTO `money` SET date = '$date', task = '$task', price = '$price_add', status = '_', card_id = '$card_id'";
	$result = mysqli_query($link, $sql);

	if ($result == false) {
		print("Произошла ошибка при выполнении запроса");
	}

	// header('Location: /money/?card_id" . '$card_id' . "&card=" . '$card' . "');
	// echo "Location: ../?card_id=$card_id&card=$card";
	header("Location: ../?card_id=$card_id&card=$card");
	//----------------------------------------------------------------------------------------
?>