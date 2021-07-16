<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<h1>Добавление данных в таблицу aircraft</h1>
	<form action="insert_aircraft.php" method="post" name="action">
		<table>
      <tr>
        <td>Введите код самолета</td>
        <td><input type="text" name="ID_Aircraft"></td>
      </tr>
			<tr>
				<td>Введите тип самолета</td>
				<td><input type="text" name="Type"></td>
			</tr>
			<tr>
				<td>Введите количество мест</td>
				<td><input type="text" name="Number_Seats"></td>
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
