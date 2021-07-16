<!DOCTYPE html>
<html>

<head>
    <title>Редактирование</title>
</head>
<body>

</body>

</html>
<?php
include 'connect.php';


$sql = "SELECT ID_Ticket, Destination, Surname, Place_Number, Price, Departure_Date FROM tickets,flights,passengers WHERE ID_Flight=ID_Flights AND ID_Passenger=ID_Passengers $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>Код билета</td>'.
	'<td>Место назначения</td>'.
	'<td>Фамилия пассажира</td>'.
	'<td>Номер места</td>'.
	'<td>Цена</td>'.
	'<td>Дата вылета</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Ticket']} </td>".
				"<td> {$row['Destination']} </td>".
				"<td> {$row['Surname']} </td>".
				"<td> {$row['Place_Number']} </td>".
				"<td> {$row['Price']} </td>".
				"<td> {$row['Departure_Date']} </td>".
				'</tr>';
	}
	echo '</table>';


?>
<form action="guest.php" method="POST">
	<input type="submit" value="Вернуться назад">
</form>
