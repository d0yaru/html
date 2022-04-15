<?php
	$card_id = $_GET['card_id'];
	$card = $_GET['card'];
	$task = $_GET['task'];
	$price_add = $_GET['price_add'];
	
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "root", "", "jarvis");

	$sql = "INSERT INTO `money` SET task = '$task', price = '$price_add', status = '_', card_id = '$card_id'";
	$result = mysqli_query($link, $sql);

	if ($result == false) {
		print("Произошла ошибка при выполнении запроса");
	}

	// header('Location: /money/?card_id" . '$card_id' . "&card=" . '$card' . "');
	// echo "Location: ../?card_id=$card_id&card=$card";
	header("Location: ../?card_id=$card_id&card=$card");
	//----------------------------------------------------------------------------------------
?>