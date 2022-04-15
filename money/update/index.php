<?php
	$id = $_GET['id'];
	$status = $_GET['status'];
	$card_id = $_GET['card_id'];
	$card = $_GET['card'];
	// echo $id;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "root", "", "jarvis");

	$sql = "UPDATE `money` SET status = '$status' WHERE id = '$id'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?card_id=$card_id&card=$card");
	//----------------------------------------------------------------------------------------
?>