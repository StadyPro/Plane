<?php
	include 'connect.php';
	if (isset($_POST['ID_Flight'])) {
	if (isset($_GET['red_id'])) {
		$sql_update = "UPDATE tickets SET ID_Flight = '{$_POST['ID_Flight']}',
		  ID_Passenger = '{$_POST['ID_Passenger']}',
		   Place_Number = '{$_POST['Place_Number']}',
		   Price = '{$_POST['Price']}',
		   Departure_Date = '{$_POST['Departure_Date']}' WHERE  ID_Ticket = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
	}
	if ($result_update) {
		echo "Успешно";
	} else {
		echo "Произошла ошибка:". mysqli_error($link);
	}
}

if (isset($_GET['red_id'])) {
	$sql_select = "SELECT ID_Ticket, ID_Flight, ID_Passenger,  Place_Number, Price, Departure_Date FROM tickets WHERE ID_Flight = {$_GET['red_id']}";
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
				<td>Код билета</td>
			<td><input type="text" name="ID_Ticket" value="<?=isset($_GET['red_id']) ? $row['ID_Ticket'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Код рейса</td>
			<td><input type="text" name="ID_Flight" value="<?=isset($_GET['red_id']) ? $row['ID_Flight'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Код пассажира</td>
			<td><input type="text" name="ID_Passenger" value="<?=isset($_GET['red_id']) ? $row['ID_Passenger'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Номер места</td>
			<td><input type="text" name="Place_Number" value="<?=isset($_GET['red_id']) ? $row['Place_Number'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Цена</td>
			<td><input type="text" name="Price" value="<?=isset($_GET['red_id']) ? $row['Price'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Дата отправдения</td>
			<td><input type="date" name="Departure_Date" value="<?=isset($_GET['red_id']) ? $row['Departure_Date'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="header.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
