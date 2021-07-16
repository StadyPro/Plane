<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<h1>Добавление данных в таблицу flights</h1>
	<form action="insert_flights.php" method="post" name="action">
		<table>
			<tr>
				<td>Введите id рейса</td>
				<td><input type="text" name="ID_Flights"></td>
			</tr>
			<tr>
				<td>Введите место назначения</td>
				<td><input type="text" name="Destination"></td>
			</tr>
			<tr>
				<td>Введите время вылета</td>
				<td><input type="text" name="Departure_Time"></td>
			</tr>
			<tr>
				<td>Введите id самолета</td>
				<td><select name="ID_Plane">
					<?php
					include 'connect.php';
					$sql_select = "SELECT ID_Aircraft,Type FROM aircraft";
					$result_select = mysqli_query($link, $sql_select);

					while ($row = mysqli_fetch_array($result_select))
					{
						echo "<option value = '".$row['ID_Aircraft']."'>".$row['Type']."</option>";
					}
					?>
				</select>
			</td>
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
