<?php
	$work_id = $_GET['work_id'];
	$work = $_GET['work'];
	$id_edit = $_GET['id_edit'];
	$date_edit = $_GET['date_edit'];
	$text_edit = $_GET['text_edit'];
	$price_edit = $_GET['price_edit'];
	// echo $id_edit;
	// echo $text_edit;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "root", "", "jarvis");

	$sql = "UPDATE `service` SET date = '$date_edit', status = '_', task = '$text_edit', price = '$price_edit' WHERE id = '$id_edit'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?work_id=$work_id&work=$work");
	//----------------------------------------------------------------------------------------
?>