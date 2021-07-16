<?php
	include 'connect.php';
	if (isset($_POST['Type'])) {
	if (isset($_GET['red_id'])) {
		$sql_update = "UPDATE aircraft SET Type = '{$_POST['Type']}', Number_Seats = '{$_POST['Number_Seats']}' WHERE ID_Aircraft = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
	}
	if ($result_update) {
		echo "Успешно";
	} else {
		echo "Произошла ошибка:". mysqli_error($link);
	}
}

if (isset($_GET['red_id'])) {
	$sql_select = "SELECT ID_Aircraft, Type, Number_Seats FROM aircraft WHERE ID_Aircraft = {$_GET['red_id']}";
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
			<td>Тип самолета</td>
			<td><input type="text" name="Type" value="<?=isset($_GET['red_id']) ? $row['Type'] : ''; ?>">
			</td>
			</tr>
			<tr>
			<td>Количество мест</td>
			<td><input type="text" name="Number_Seats" value="<?=isset($_GET['red_id']) ? $row['Number_Seats'] : ''; ?>">
			</td>
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
