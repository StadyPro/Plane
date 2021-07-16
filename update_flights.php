<?php
	include 'connect.php';
	if (isset($_POST['Destination'])) {
	if (isset($_GET['red_id'])) {
		$sql_update = "UPDATE flights SET Destination = '{$_POST['Destination']}' WHERE ID_Flights = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
	}
	if ($result_update) {
		echo "Успешно";
	} else {
		echo "Произошла ошибка:". mysqli_error($link);
	}
}

if (isset($_GET['red_id'])) {
	$sql_select = "SELECT ID_Flights,Destination,Departure_Time,Type FROM flights, aircraft WHERE ID_Plane=ID_Aircraft AND ID_Flights = {$_GET['red_id']}";
	$result_select = mysqli_query($link, $sql_select);
	$row = mysqli_fetch_array($result_select);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<table>
			<tr>
			<td>Место назначения</td>
			<td><input type="text" name="Destination" value="<?=isset($_GET['red_id']) ? $row['Destination'] : ''; ?>"></td>
			</tr>
			<tr>
			<td>Время отправления</td>
			<td><input type="time" name="Departure_Time" value="<?=isset($_GET['red_id']) ? $row['Departure_Time'] : ''; ?>"></td>
			</tr>
			<tr>
			<td>Тип самолета</td>
			<td><input type="text" name="Type" value="<?=isset($_GET['red_id']) ? $row['ID_Plane'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_flights_admin.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
