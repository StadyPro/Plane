<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<h1>Добавление данных в таблицу tickets</h1>
	<form action="insert_tickets.php" method="post" name="action">
		<table>
			<tr>
				<td>Введите id билета</td>
				<td><input type="text" name="ID_Ticket"></td>
			</tr>
			<tr>
				<td>Введите тип самолета</td>
				<td><select name="ID_Flight">
					<?php
					include 'connect.php';
					$sql_select = "SELECT Type FROM aircraft";
					$result_select = mysqli_query($link, $sql_select);

					while ($row = mysqli_fetch_array($result_select))
					{
						echo "<option value = '".$row['ID_Flight']."'>".$row['Type']."</option>";
					}
					?>
				</select>
			</td>
			</tr>
			<tr>
				<td>Введите фамилию пассажира</td>
				<td><select name="ID_Passenger">
					<?php
					include 'connect.php';
					$sql_select = "SELECT Surname FROM passengers";
					$result_select = mysqli_query($link, $sql_select);

					while ($row = mysqli_fetch_array($result_select))
					{
						echo "<option value = '".$row['ID_Passenger']."'>".$row['Surname']."</option>";
					}
					?>
				</select>
			</td>
			</tr>
      <tr>
				<td>Введите номер места</td>
				<td><input type="text" name="Place_Number"></td>
			</tr><tr>
				<td>Введите цену</td>
				<td><input type="text" name="Price"></td>
			</tr><tr>
				<td>Введите дату вылета</td>
				<td><input type="date" name="Departure_Date"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Добавить данные">
				<input type="reset" value="Очистить форму">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
