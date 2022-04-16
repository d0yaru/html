<?php
	$id = $_GET['id'];
	$projects_id = $_GET['projects_id'];
	$projects = $_GET['projects'];
	// echo $id;
	//----------------------------------------------------------------------------------------
	// $link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	// $sql = "DELETE FROM `todolist` WHERE id = '$id'";
	// $result = mysqli_query($link, $sql);

	header("Location: ../?projects_id=$projects_id&projects=$projects");
	//----------------------------------------------------------------------------------------
?>