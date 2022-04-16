<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Service</title>
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
			<div class="h1"><h1>Service</h1></div>
			<div class="nav">
				<a href="/todolist">ToDoList</a>
				<a href="/money">Money</a>
				<a class="active" href="/service">Service</a>
			</div>
		</div>
		<hr>
		<?php
		//----------------------------------------------------------------------------------------
		$work_id = $_GET['work_id'];
		$work = $_GET['work'];
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
		$sql = "SELECT `id`, `name` FROM `work`";
		$result = mysqli_query($link, $sql);
		//----------------------------------------------------------------------------------------
		while ($row = mysqli_fetch_array($result)) {
			print(" <a href='?work_id=" . $row['id'] . "&work=" . $row['name'] . "' class='menu'>" . $row['name'] . "</a> ");
		}

		print("<hr>");
		echo "<h2>" . $work . "</h2>";
		// echo $work_id;
		//////////////////////////////////////////////////////////////////////////////////////////
		//----------------------------------------------------------------------------------------
		print("<hr>");
		//----------------------------------------------------------------------------------------
		//////////////////////////////////////////////////////////////////////////////////////////
		$sql = "SELECT `task`, `price`, `id`, `status`, `date`, `client` FROM `service` WHERE work_id = '$work_id'";
		$result = mysqli_query($link, $sql);
		//----------------------------------------------------------------------------------------
		$priceAll = 0;
		while ($row = mysqli_fetch_array($result)) {
			if ($row['status'] == "_") {
				print("<a href='update?id=" . $row['id'] . "&status=v&work_id=" . $work_id . "&work=" . $work . "'>[&#160;&#160;]</a> &nbsp;&nbsp;" . $row['date'] . " ... " . $row['task'] . " ... " . $row['client'] . " ... "  . $row['price'] . " р.&nbsp;&nbsp;<a href='update?id=" . $row['id'] . "&status=r&work_id=" . $work_id . "&work=" . $work . "'>&#128274;</a><br>");
			}
			else if ($row['status'] == "r") {
				print("<form action='edit' method='GET' name='form'>");
					print("<input type='hidden' name='work_id' value='" . $work_id . "'>");
					print("<input type='hidden' name='work' value='" . $work . "'>");
					print("&#128275; &nbsp;&nbsp;<input type='date' name='date_edit' value='" . $row['date'] . "'> - <input type='text' name='text_edit' value='" . $row['task'] . "'> - <input type='text' name='client_edit' value='" . $row['client'] . "'> - <input type='text' name='price_edit' value='" . $row['price'] . "' size='1'> р.&nbsp;&nbsp;<input type='hidden' name='id_edit' value='" . $row['id'] . "'> <input type='submit' name='btn_edit' value='&#10004;' class = 'btn'> <a href='delete?id=" . $row['id'] . "&work_id=" . $work_id . "&work=" . $work . "'>&#10060;</a><br>");
				print("</form>");
			}
			else if ($row['status'] == "v"){
				print("<strike><i><a href='update?id=" . $row['id'] . "&status=_&work_id=" . $work_id . "&work=" . $work . "'>[&#10006;]</a> &nbsp;&nbsp;" . $row['date'] . " ... "  . $row['task'] . " ... " . $row['client'] . " ... "  . $row['price'] . " р.&nbsp;&nbsp;<a href='update?id=" . $row['id'] . "&status=r&work_id=" . $work_id . "&work=" . $work . "'>&#128274;</a></i></strike><br>");
			}
			if ($row['status'] != "v") $priceAll += $row['price'];
		}
		//////////////////////////////////////////////////////////////////////////////////////////
		//----------------------------------------------------------------------------------------
		print("<hr>");
		//----------------------------------------------------------------------------------------
		print("<b>ИТОГО: " . $priceAll . " р.</b>");
		//----------------------------------------------------------------------------------------
		print("<hr>");
		print("<form action='add' method='GET' name='form'>");
			print("<input type='hidden' name='work_id' value='" . $work_id . "'>");
			print("<input type='hidden' name='work' value='" . $work . "'>");
			$date=date("Y-m-d");
			print("<input type='date' name='date' value='" . $date . "'> ... ");
			print("<input type='text' name='task' value='' required placeholder='Новый ремонт'> ... ");
			print("<input type='text' name='client' value='' placeholder='Клиент'> ... ");
			print("<input type='text' name='price_add' value='0' size='1'> р. ");
			print("<input type='submit' name='btn_add' value='&#10004;' class = 'btn'>");
		print("</form>");
		?>
		<hr>
	</div>
</body>
</html>