<?php
	$id = $_GET['id'];
	$work_id = $_GET['work_id'];
	$work = $_GET['work'];
	// echo $id;
	//----------------------------------------------------------------------------------------
	// $link = mysqli_connect("localhost", "root", "", "jarvis");

	// $sql = "DELETE FROM `service` WHERE id = '$id'";
	// $result = mysqli_query($link, $sql);

	header("Location: ../?work_id=$work_id&work=$work");
	//----------------------------------------------------------------------------------------
?>