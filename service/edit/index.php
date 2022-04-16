<?php
	$work_id = $_GET['work_id'];
	$work = $_GET['work'];
	$id_edit = $_GET['id_edit'];
	$date_edit = $_GET['date_edit'];
	$text_edit = $_GET['text_edit'];
	$client_edit = $_GET['client_edit'];
	$price_edit = $_GET['price_edit'];
	// echo $id_edit;
	// echo $text_edit;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "UPDATE `service` SET status = '_', date = '$date_edit', task = '$text_edit', client = '$client_edit', price = '$price_edit' WHERE id = '$id_edit'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?work_id=$work_id&work=$work");
	//----------------------------------------------------------------------------------------
?>