<?php
	include 'connect.php';
	if (isset($_POST['Surname'])) {
	if (isset($_GET['red_id'])) {
		$sql_update = "UPDATE passengers SET Surname = '{$_POST['Surname']}', Name = '{$_POST['Name']}', Patronymic = '{$_POST['Patronymic']}', Passport_data = '{$_POST['Passport_data']}' WHERE D_Passengers  = {$_GET['red_id']}";
		$result_update = mysqli_query($link, $sql_update);
	}
	if ($result_update) {
		echo "Успешно";
	} else {
		echo "Произошла ошибка:". mysqli_error($link);
	}
}

if (isset($_GET['red_id'])) {
	$sql_select = "SELECT ID_Passengers, Surname, Name, Patronymic, Passport_data FROM passengers WHERE ID_Passengers = {$_GET['red_id']}";
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
			<td>Фамилия</td>
			<td><input type="text" name="Surname" value="<?=isset($_GET['red_id']) ? $row['Surname'] : ''; ?>">
			</td>
			</tr>
			<tr>
			<td>Имя</td>
			<td><input type="text" name="Name" value="<?=isset($_GET['red_id']) ? $row['Name'] : ''; ?>">
			</td>
			</tr>
      <tr>
			<td>Отчество</td>
			<td><input type="text" name="Patronymic" value="<?=isset($_GET['red_id']) ? $row['Patronymic'] : ''; ?>">
			</td>
			</tr>
      <tr>
			<td>Паспортные даныые</td>
			<td><input type="text" name="Passport_data" value="<?=isset($_GET['red_id']) ? $row['Passport_data'] : ''; ?>">
			</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="Сохранить">
				</td>
			</tr>
		</table>
	</form>
	<form action="index_passengers_admin.php" method="POST">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
