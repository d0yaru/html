<?php
	$card_id = $_GET['card_id'];
	$card = $_GET['card'];
	$id_edit = $_GET['id_edit'];
	$text_edit= $_GET['text_edit'];
	$price_edit= $_GET['price_edit'];
	// echo $id_edit;
	// echo $text_edit;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "root", "", "jarvis");

	$sql = "UPDATE `money` SET status = '_', task = '$text_edit', price = '$price_edit' WHERE id = '$id_edit'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?card_id=$card_id&card=$card");
	//----------------------------------------------------------------------------------------
?>