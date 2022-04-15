<?php
	$work_id = $_GET['work_id'];
	$work = $_GET['work'];
	$date = $_GET['date'];
	$task = $_GET['task'];
	$price_add = $_GET['price_add'];
	
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "root", "", "jarvis");

	$sql = "INSERT INTO `service` SET date = '$date', task = '$task', price = '$price_add', status = '_', work_id = '$work_id'";
	$result = mysqli_query($link, $sql);

	if ($result == false) {
		print("Произошла ошибка при выполнении запроса");
	}

	// header('Location: /money/?work_id" . '$work_id' . "&work=" . '$work' . "');
	// echo "Location: ../?work_id=$work_id&work=$work";
	header("Location: ../?work_id=$work_id&work=$work");
	//----------------------------------------------------------------------------------------
?>