<?php
	$projects_id = $_GET['projects_id'];
	$projects = $_GET['projects'];
	$id_edit = $_GET['id_edit'];
	$text_edit= $_GET['text_edit'];
	// echo $id_edit;
	// echo $text_edit;
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "root", "", "jarvis");

	$sql = "UPDATE `todolist` SET status = '_', task = '$text_edit' WHERE id = '$id_edit'";

	$result = mysqli_query($link, $sql);

	header("Location: ../?projects_id=$projects_id&projects=$projects");
	//----------------------------------------------------------------------------------------
?>