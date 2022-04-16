<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ToDoList</title>
	<style>
		body {
			background-color: #999;
			font-family: 'Roboto', sans-serif;
		}
		a {
			text-decoration: none;
			color: #333;
		}
		.btn {
			cursor: pointer;
		}
		.menu {
			padding: 5px 10px;
			background-color: #333;
			color: #fff;
			border-radius: 3px;
		}
		.menu:hover {
			background-color: #555;
		}
		.wrapper {
			max-width:950px;
			margin: 0 auto;
			border: 1px solid #999;
			padding: 10px;
			background-color: #ccc;
			border-radius: 5px;
		}
		.header {
			display: flex;
			justify-content: space-between;
		}
		.header a {
			margin-left: 10px;
			font-weight: 700;
			padding: 1px 10px;
		}
		.active {
			border-bottom: 2px solid #333;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<div class="h1"><h1>ToDoList</h1></div>
			<div class="nav">
				<a class="active" href="/todolist">ToDoList</a>
				<a href="/money">Money</a>
				<a href="/service">Service</a>
			</div>
		</div>
		<hr>
		<?php
		//----------------------------------------------------------------------------------------
		$projects_id = $_GET['projects_id'];
		$projects = $_GET['projects'];
		//----------------------------------------------------------------------------------------
		$link = mysqli_connect("localhost", "d0yaru", "lapalapa", "jarvis");

		if ($link == false) {
			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}
		// else {
		// 	print("Подключение к MySQL ... [ ok ]" . mysqli_connect_error());
		// }
		mysqli_set_charset($link, "utf8");// кирилица
		//----------------------------------------------------------------------------------------
		//////////////////////////////////////////////////////////////////////////////////////////
		$sql = "SELECT `id`, `title` FROM `projects`";
		$result = mysqli_query($link, $sql);
		//----------------------------------------------------------------------------------------
		while ($row = mysqli_fetch_array($result)) {
			print(" <a href='?projects_id=" . $row['id'] . "&projects=" . $row['title'] . "' class='menu'>" . $row['title'] . "</a> ");
		}

		print("<hr>");
		echo "<h2>" . $projects . "</h2>";
		// echo $projects_id;
		//////////////////////////////////////////////////////////////////////////////////////////
		//----------------------------------------------------------------------------------------
		print("<hr>");
		//----------------------------------------------------------------------------------------
		//////////////////////////////////////////////////////////////////////////////////////////
		$sql = "SELECT `task`, `id`, `status`, `date` FROM `todolist` WHERE projects_id = '$projects_id'";
		$result = mysqli_query($link, $sql);
		//----------------------------------------------------------------------------------------
		while ($row = mysqli_fetch_array($result)) {
			if ($row['status'] == "_") {
				print("<a href='update?id=" . $row['id'] . "&status=v&projects_id=" . $projects_id . "&projects=" . $projects . "'>[&#160;&#160;]</a> &nbsp;&nbsp;" . $row['date'] . " ... " . $row['task'] . "&nbsp;&nbsp;<a href='update?id=" . $row['id'] . "&status=r&projects_id=" . $projects_id . "&projects=" . $projects . "'>&#128274;</a><br>");
			}
			else if ($row['status'] == "r") {
				print("<form action='edit' method='GET' name='form'>");
					print("<input type='hidden' name='projects_id' value='" . $projects_id . "'>");
					print("<input type='hidden' name='projects' value='" . $projects . "'>");
					print("&#128275; &nbsp;&nbsp;<input type='date' name='date_edit' value='" . $row['date'] . "'> - <input type='text' name='text_edit' value='" . $row['task'] . "'>&nbsp;&nbsp;<input type='hidden' name='id_edit' value='" . $row['id'] . "'> <input type='submit' name='btn_edit' value='&#10004;' class = 'btn'> <a href='delete?id=" . $row['id'] . "&projects_id=" . $projects_id . "&projects=" . $projects . "'>&#10060;</a><br>");
				print("</form>");
			}
			else if ($row['status'] == "v"){
				print("<strike><i><a href='update?id=" . $row['id'] . "&status=_&projects_id=" . $projects_id . "&projects=" . $projects . "'>[&#10004;]</a> &nbsp;&nbsp;" . $row['date'] . " ... " . $row['task'] . "&nbsp;&nbsp;<a href='update?id=" . $row['id'] . "&status=r&projects_id=" . $projects_id . "&projects=" . $projects . "'>&#128274;</a></i></strike><br>");
			}
		}
		//////////////////////////////////////////////////////////////////////////////////////////
		//----------------------------------------------------------------------------------------
		
		print("<hr>");
		print("<form action='add' method='GET' name='form'>");
			print("<input type='hidden' name='projects_id' value='" . $projects_id . "'>");
			print("<input type='hidden' name='projects' value='" . $projects . "'>");
			$date=date("Y-m-d");
			print("<input type='date' name='date' value='" . $date . "'> ... ");
			print("<input type='text' name='task' value='' required placeholder='Новая задача'> ");
			print("<input type='submit' name='btn_add' value='&#10004;' class = 'btn'>");
		print("</form>");
		?>
		<hr>
	</div>
</body>
</html>