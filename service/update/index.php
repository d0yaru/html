<?php
	$id = $_GET['id'];
	$status = $_GET['status'];
	$work_id = $_GET['work_id'];
	$work = $_GET['work'];
	// echo $id;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "UPDATE `service` SET status = '$status' WHERE id = '$id'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?work_id=$work_id&work=$work");
	//----------------------------------------------------------------------------------------
?>