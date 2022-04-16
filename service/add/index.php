<?php
	$work_id = $_GET['work_id'];
	$work = $_GET['work'];
	$date = $_GET['date'];
	$task = $_GET['task'];
	$client = $_GET['client'];
	$price_add = $_GET['price_add'];
	
	//----------------------------------------------------------------------------------------
	$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

	$sql = "INSERT INTO `service` SET status = '_', date = '$date', task = '$task', client = '$client', price = '$price_add', work_id = '$work_id'";
	$result = mysqli_query($link, $sql);

	if ($result == false) {
		print("Произошла ошибка при выполнении запроса");
	}

	// header('Location: /money/?work_id" . '$work_id' . "&work=" . '$work' . "');
	// echo "Location: ../?work_id=$work_id&work=$work";
	header("Location: ../?work_id=$work_id&work=$work");
	//----------------------------------------------------------------------------------------
?>