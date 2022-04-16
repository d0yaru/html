<?php
	$card_id = $_GET['card_id'];
	$card = $_GET['card'];
	$id_edit = $_GET['id_edit'];
	$date_edit = $_GET['date_edit'];
	$text_edit= $_GET['text_edit'];
	$price_edit= $_GET['price_edit'];
	// echo $id_edit;
	// echo $text_edit;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "UPDATE `money` SET status = '_', date = '$date_edit', task = '$text_edit', price = '$price_edit' WHERE id = '$id_edit'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?card_id=$card_id&card=$card");
	//----------------------------------------------------------------------------------------
?>