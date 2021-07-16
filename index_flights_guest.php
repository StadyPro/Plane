
<!DOCTYPE html>
<html>

<head>
    <title>Рейсы</title>
</head>
<body>
</body>

</html>
<?php
include 'connect.php';

$sql = "SELECT ID_Flights,Destination,Departure_Time,Type FROM flights, aircraft WHERE ID_Plane=ID_Aircraft $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>Код рейса</td>'.
	'<td>Место назначения</td>'.
	'<td>Время вылета</td>'.
	'<td>Тип самолета</td>'.

	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Flights']} </td>".
				"<td> {$row['Destination']} </td>".
				"<td> {$row['Departure_Time']} </td>".
				"<td> {$row['Type']} </td>".

				'</tr>';
	}
	echo '</table>';

?>
<form action="guest.php" method="POST">
	<input type="submit" value="Вернуться назад">
</form>
