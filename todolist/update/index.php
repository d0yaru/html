<?php
	$id = $_GET['id'];
	$status = $_GET['status'];
	$projects_id = $_GET['projects_id'];
	$projects = $_GET['projects'];
	// echo $id;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "UPDATE `todolist` SET status = '$status' WHERE id = '$id'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?projects_id=$projects_id&projects=$projects");
	//----------------------------------------------------------------------------------------
?>