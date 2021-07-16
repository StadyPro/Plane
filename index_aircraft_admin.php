<?php
	include 'connect.php';
	if (isset($_GET['del_id']))
	{
		$sql_delete = "DELETE FROM aircraft WHERE ID_Aircraft = {$_GET['del_id']}";
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
        <li><a href="index_aircraft_admin.php?sort=Type_aircraft-asc">Тип самолета от А до Я</a></li>
        <li><a href="index_aircraft_admin.php?sort=Type_aircraft-desc">Тип самолета от Я до А</a></li>
        <li><a href="index_aircraft_admin.php?sort=default">Тип самолета по умолчанию</a></li>
    </ul>
    <form action="index_aircraft_insert.php" method="post">
        <input type="submit" name="connect" value="Добавить">
    </form>
</body>

</html>
<?php
include 'connect.php';

$sorting = $_GET['sort'];


switch ($sorting) {
	case 'Type_aircraft-asc':
		$sorting_sql = 'ORDER BY Type ASC';
		break;
	case 'Type_aircraft-desc':
		$sorting_sql = 'ORDER BY Type DESC';
		break;
	case 'default':
		$sorting_sql = '';
}
$poisk = $_POST['poisk'];
$reser = $_POST['reset'];
if (empty($poisk))
{
$sql = "SELECT * FROM aircraft $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>Код самолета</td>'.
	'<td>Тип самолета</td>'.
	'<td>Количество мест</td>'.
        '<td>Удаление</td>'.
        '<td>Редактирование</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Aircraft']} </td>".
				"<td> {$row['Type']} </td>".
				"<td> {$row['Number_Seats']} </td>".
				"<td><a href='index_aircraft_admin.php?del_id={$row['ID_Aircraft']}'>Удадить</a> </td>".
				"<td><a href='update_aircraft.php?red_id={$row['ID_Aircraft']}'>Изменить</a></td>".
				'</tr>';
	}
	echo '</table>';
} else {
	$sqllike = "SELECT * FROM aircraft WHERE ID_Aircraft LIKE '%$poisk%' OR Type LIKE '%$poisk%'";
	$res = mysqli_query($link, $sqllike); echo '<table border=1>'.
	'<tr>'.
	'<td>Код самолета</td>'.
	'<td>Тип самолета</td>'.
	'<td>Количество мест</td>'.
	'<td>Удаление</td>'.
	'<td>Редактирование</td>'.
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['ID_Aircraft']} </td>" .
		"<td> {$row1['Type']}</td>".
		"<td> {$row1['Number_Seats']} </td>".
            "<td><a href='index_aircraft_admin.php?del_id={$row1['ID_Aircraft']}'>Удадить</a> </td>".
				"<td><a href='update_aircraft.php?red_id={$row1['ID_Aircraft']}'>Изменить</a></td>".
		'</tr>';
	}
	echo '</table>';
}
?>
<form action="admin.php" method="POST">
	<input type="submit" value="Вернуться назад">
</form>
