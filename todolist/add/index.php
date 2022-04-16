<?php
	$projects_id = $_GET['projects_id'];
	$projects = $_GET['projects'];
	$date = $_GET['date'];
	$task = $_GET['task'];
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "INSERT INTO `todolist` SET date = '$date', task = '$task', status = '_', projects_id = '$projects_id'";
	$result = mysqli_query($link, $sql);

	if ($result == false) {
		print("Произошла ошибка при выполнении запроса");
	}

	// header('Location: /todolist/?projects_id" . '$projects_id' . "&projects=" . '$projects' . "');
	// echo "Location: ../?projects_id=$projects_id&projects=$projects";
	header("Location: ../?projects_id=$projects_id&projects=$projects");
	//----------------------------------------------------------------------------------------
?>