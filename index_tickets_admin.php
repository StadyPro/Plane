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
		<link rel="stylesheet" type="text/css" href="style.css">
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
        <li><a href="index_tickets_admin.php?sort=Destination_aircraft-asc">Место назначения от А до Я</a></li>
        <li><a href="index_tickets_admin.php?sort=Destination_aircraft-desc">Место назначения от Я до А</a></li>
        <li><a href="index_tickets_admin.php?sort=default">Место назначения по умолчанию</a></li>
    </ul>
    <form action="index_tickets_insert.php" method="post">
        <input type="submit" name="connect" value="Добавить">
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
        '<td>Удаление</td>'.
        '<td>Редактирование</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Ticket']} </td>".
				"<td> {$row['Destination']} </td>".
				"<td> {$row['Surname']} </td>".
				"<td> {$row['Place_Number']} </td>".
				"<td> {$row['Price']} </td>".
				"<td> {$row['Departure_Date']} </td>".
				"<td><a href='index_tickets_admin.php?del_id={$row['ID_Ticket']}'>Удадить</a> </td>".
				"<td><a href='update_tickets.php?red_id={$row['ID_Ticket']}'>Изменить</a></td>".
				'</tr>';
	}
	echo '</table>';
} else {
	$sqllike = "SELECT ID_Ticket, Destination, Surname, Place_Number, Price, Departure_Date FROM tickets,flights,passengers WHERE ID_Flight=ID_Flights AND ID_Passenger=ID_Passengers AND
	(ID_Ticket LIKE '%$poisk%' OR Destination LIKE '%$poisk%'
	OR Surname LIKE '%$poisk%' OR Place_Number LIKE '%$poisk%'
OR Price LIKE '%$poisk%' OR Departure_Date LIKE '%$poisk%')";
	$res = mysqli_query($link, $sqllike); echo '<table border=1>'.
	'<tr>'.
	'<td>Код билета</td>'.
	'<td>Место назначения</td>'.
	'<td>Фамилия пассажира</td>'.
	'<td>Номер места</td>'.
	'<td>Цена</td>'.
	'<td>Дата вылета</td>'.
  '<td>Удаление</td>'.
  '<td>Редактирование</td>'.
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['ID_Ticket']} </td>".
		"<td> {$row1['Destination']} </td>".
		"<td> {$row1['Surname']} </td>".
		"<td> {$row1['Place_Number']} </td>".
		"<td> {$row1['Price']} </td>".
		"<td> {$row1['Departure_Date']} </td>".
            "<td><a href='index_tickets_admin.php?del_id={$row1['ID_Ticket']}'>Удадить</a> </td>".
				"<td><a href='update_tickets.php?red_id={$row1['ID_Ticket']}'>Изменить</a></td>".
		'</tr>';
	}
	echo '</table>';
}
?>
<form action="admin.php" method="POST">
	<input type="submit" value="Вернуться назад">
</form>
