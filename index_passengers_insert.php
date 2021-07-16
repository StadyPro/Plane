<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<h1>Добавление данных в таблицу passengers</h1>
	<form action="insert_passengers.php" method="post" name="action">
		<table>
      <tr>
        <td>Введите код пассажира</td>
        <td><input type="text" name="ID_Passengers "></td>
      </tr>
			<tr>
				<td>Введите фамилию пассажира</td>
				<td><input type="text" name="Surname"></td>
			</tr>
			<tr>
				<td>Введите имя пассажира</td>
				<td><input type="text" name="Name"></td>
			</tr>
      <tr>
				<td>Введите отчество пассажира</td>
				<td><input type="text" name="Patronymic"></td>
			</tr>
      <tr>
				<td>Введите паспортные данные пассажира</td>
				<td><input type="text" name="Passport_data"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Добавть данные">
				<input type="reset" value="Очистить форму">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
