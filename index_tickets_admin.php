<?php
	include 'connect.php';
	if (isset($_GET['del_id']))
	{
		$sql_delete = "DELETE FROM tickets WHERE ID_Ticket = {$_GET['del_id']}";
		$result_delete = mysqli_query($link, $sql_delete);
		if ($result_delete)
		{
			header('Location: index.php');
		}
		else
		{
			echo '<p>Произошла ошибка: '.mysqli_error($link).'</p>';
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Редактирование</title>
</head>
<body>
	<table border=1>
		<tr>
      <td>Код билета</td>
			<td>Код рейса</td>
			<td>Код пассажира</td>
			<td>Номер места</td>
			<td>Цена</td>
			<td>Дата отправления</td>
			<td>Удаление</td>
		    <td>Редактирование</td>
		</tr>
		<?php
			$sql = "SELECT ID_Ticket, ID_Flight, ID_Passenger, Place_Number, Price, Departure_Date FROM tickets";
			$result = mysqli_query($link, $sql);
			while($row = mysqli_fetch_array($result))
			{
				echo '<tr>'.
				"<td> {$row['ID_Ticket']} </td>".
				"<td> {$row['ID_Flight']} </td>".
				"<td> {$row['ID_Passenger']} </td>".
				"<td> {$row['Place_Number']} </td>".
				"<td> {$row['Price']} </td>".
				"<td> {$row['Departure_Date']} </td>".
				"<td><a href='?del_id={$row['ID_Ticket']}'>Удадить</a> </td>".
				"<td><a href='update_tickets.php?red_id={$row['ID_Ticket']}'>Изменить</a></td>".
				'</tr>';
			}
		 ?>
	</table>
	<form action="index_tickets_insert.php" method="post">
		<input type="submit" name="connect" value="Добавить">
    </form>
</body>
</html>
