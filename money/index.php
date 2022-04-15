<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Money</title>
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
			<div class="h1"><h1>Money</h1></div>
			<div class="nav">
				<a href="/todolist">ToDoList</a>
				<a class="active" href="/money">Money</a>
				<a href="/service">Service</a>
			</div>
		</div>
		<hr>
		<?php
		//----------------------------------------------------------------------------------------
		$card_id = $_GET['card_id'];
		$card = $_GET['card'];
		//----------------------------------------------------------------------------------------
		$link = mysqli_connect("localhost", "root", "", "jarvis");

		if ($link == false) {
			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}
		// else {
		// 	print("Подключение к MySQL ... [ ok ]" . mysqli_connect_error());
		// }
		//----------------------------------------------------------------------------------------
		//////////////////////////////////////////////////////////////////////////////////////////
		$sql = "SELECT `id`, `name` FROM `card`";
		$result = mysqli_query($link, $sql);
		//----------------------------------------------------------------------------------------
		while ($row = mysqli_fetch_array($result)) {
			print(" <a href='?card_id=" . $row['id'] . "&card=" . $row['name'] . "' class='menu'>" . $row['name'] . "</a> ");
		}

		print("<hr>");
		echo "<h2>" . $card . "</h2>";
		// echo $card_id;
		//////////////////////////////////////////////////////////////////////////////////////////
		//----------------------------------------------------------------------------------------
		print("<hr>");
		//----------------------------------------------------------------------------------------
		//////////////////////////////////////////////////////////////////////////////////////////
		$sql = "SELECT `task`, `price`, `id`, `status` FROM `money` WHERE card_id = '$card_id'";
		$result = mysqli_query($link, $sql);
		//----------------------------------------------------------------------------------------
		$priceAll = 0;
		while ($row = mysqli_fetch_array($result)) {
			if ($row['status'] == "_") {
				print("<a href='update?id=" . $row['id'] . "&status=v&card_id=" . $card_id . "&card=" . $card . "'>[&#160;&#160;]</a> &nbsp;&nbsp;" . $row['task'] . " - "  . $row['price'] . " р.&nbsp;&nbsp;<a href='update?id=" . $row['id'] . "&status=r&card_id=" . $card_id . "&card=" . $card . "'>&#128274;</a><br>");
			}
			else if ($row['status'] == "r") {
				print("<form action='edit' method='GET' name='form'>");
					print("<input name='card_id' type='hidden' value='" . $card_id . "'>");
					print("<input name='card' type='hidden' value='" . $card . "'>");
					print("&#128275; &nbsp;&nbsp;<input name='text_edit' type='text' value='" . $row['task'] . "'> - <input name='price_edit' type='text' value='" . $row['price'] . "'> р.&nbsp;&nbsp;<input name='id_edit' type='hidden' value='" . $row['id'] . "'> <input type='submit' name='btn_edit' value='&#10004;' class = 'btn'> <a href='delete?id=" . $row['id'] . "&card_id=" . $card_id . "&card=" . $card . "'>&#10060;</a><br>");
				print("</form>");
			}
			else if ($row['status'] == "v"){
				print("<strike><i><a href='update?id=" . $row['id'] . "&status=_&card_id=" . $card_id . "&card=" . $card . "'>[&#10006;]</a> &nbsp;&nbsp;" . $row['task'] . " - "  . $row['price'] . " р.&nbsp;&nbsp;<a href='update?id=" . $row['id'] . "&status=r&card_id=" . $card_id . "&card=" . $card . "'>&#128274;</a></i></strike><br>");
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
			print("<input name='card_id' type='hidden' value='" . $card_id . "'>");
			print("<input name='card' type='hidden' value='" . $card . "'>");
			print("<input name='task' type='text' value=''> - ");
			print("<input name='price_add' type='text' value=''> р. ");
			print("<input type='submit' name='btn_add' value='&#10004;' class = 'btn'>");
		print("</form>");
		?>
		<hr>
	</div>
</body>
</html>