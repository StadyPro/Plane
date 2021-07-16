<?php
	include 'connect.php';
	if (isset($_GET['del_id']))
	{
		$sql_delete = "DELETE FROM flights WHERE ID_Flights = {$_GET['del_id']}";
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
   <form method="post">
		<table>
			<tr>
				<td> Поле для поиска </td>
				<td><input	type="text"	name="poisk" value="<?=$_POST['poisk']; ?>"></td>
				<td><input type="submit" name="submit" value="ОК"></td>
			</tr>
		</table>
	</form>
    <ul>
        <li><a href="index_flights_admin.php?sort=Destination_aircraft-asc">Место назначения от А до Я</a></li>
        <li><a href="index_flights_admin.php?sort=Destination_aircraft-desc">Место назначения от Я до А</a></li>
        <li><a href="index_flights_admin.php?sort=default">Место назначения по умолчанию</a></li>
    </ul>
    <form action="index_flights_insert.php" method="post">
        <input type="submit" name="connect" value="Добавить">
    </form>
    <form action="admin.php" method="POST">
  		<input type="submit" value="Вернуться назад">
  	</form>
</body>

</html>
<?php
include 'connect.php';

$sorting = $_GET['sort'];


switch ($sorting) {
	case 'Destination_aircraft-asc':
		$sorting_sql = 'ORDER BY Destination ASC';
		break;
	case 'Destination_aircraft-desc':
		$sorting_sql = 'ORDER BY Destination DESC';
		break;
	case 'default':
		$sorting_sql = '';
}
$poisk = $_POST['poisk'];
$reser = $_POST['reset'];
if (empty($poisk))
{
$sql = "SELECT ID_Flights,Destination,Departure_Time,Type FROM flights, aircraft WHERE ID_Plane=ID_Aircraft $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>Код рейса</td>'.
	'<td>Место назначения</td>'.
	'<td>Время вылета</td>'.
	'<td>Тип самолета</td>'.
        '<td>Удаление</td>'.
        '<td>Редактирование</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Flights']} </td>".
				"<td> {$row['Destination']} </td>".
				"<td> {$row['Departure_Time']} </td>".
				"<td> {$row['Type']} </td>".
				"<td><a href='index_flights_admin.php?del_id={$row['ID_Flights']}'>Удадить</a> </td>".
				"<td><a href='update_flights.php?red_id={$row['ID_Flights']}'>Изменить</a></td>".
				'</tr>';
	}
	echo '</table>';
} else {
	$sqllike = "SELECT ID_Flights,Destination,Departure_Time,Type FROM flights, aircraft WHERE ID_Plane=ID_Aircraft AND ID_Flights LIKE '%$poisk%' OR Destination LIKE '%$poisk%'
	OR Departure_Time LIKE '%$poisk%' OR Type LIKE '%$poisk%'";
	$res = mysqli_query($link, $sqllike); echo '<table border=1>'.
	'<tr>'.
	'<td>Код рейса</td>'.
	'<td>Место назначения</td>'.
	'<td>Время вылета</td>'.
	'<td>Тип самолета</td>'.
  '<td>Удаление</td>'.
  '<td>Редактирование</td>'.
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['ID_Flights']} </td>" .
		"<td> {$row1['Destination']}</td>".
		"<td> {$row1['Departure_Time']} </td>".
		"<td> {$row1['Type']} </td>".
            "<td><a href='index_flights_admin.php?del_id={$row1['ID_Flights']}'>Удадить</a> </td>".
				"<td><a href='update_flights.php?red_id={$row1['ID_Flights']}'>Изменить</a></td>".
		'</tr>';
	}
	echo '</table>';
}
?>
