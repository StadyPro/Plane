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
<ul>
	<li><a href="index_flights_admin.php?sort=Destination-asc">Место назначения от А до Я</a></li>
	<li><a href="index_flights_admin.php?sort=Destination-desc">Место назначения от Я до А</a></li>
	<li><a href="index_flights_admin.php?sort=default">Место назначения по умолчанию</a></li>
</ul>
	<form action="index_flights_insert.php" method="post">
		<input type="submit" name="connect" value="Добавить">
    </form>
</body>
</html>
<?php
include 'connect.php';
$sorting = $_GET['sort'];

switch ($sorting) {
	case 'Destination-asc':
		$sorting_sql = 'ORDER BY Destination ASC';
		break;
	case 'Destination-desc':
		$sorting_sql = 'ORDER BY Destination DESC';
		break;
	case 'default':
		$sorting_sql = '';
}
$sql = "SELECT * FROM flights $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	"<td>Код рейса</td>".
			"<td>Место назначения</td>".
			"<td>Время отправления</td>".
			"<td>Код самолета</td>".
			"<td>Удаление</td>".
		    "<td>Редактирование</td>".
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Flights']} </td>".
				"<td> {$row['Destination']} </td>".
				"<td> {$row['Departure_Time']} </td>".
				"<td> {$row['ID_Plane']} </td>".
				"<td><a href='?del_id={$row['ID_Flights']}'>Удадить</a> </td>".
				"<td><a href='update_flights.php?red_id={$row['ID_Flights']}'>Изменить</a></td>".
				'</tr>';
	}
	echo '</table>';
?>
