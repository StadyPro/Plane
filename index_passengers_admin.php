<?php
	include 'connect.php';
	if (isset($_GET['del_id']))
	{
		$sql_delete = "DELETE FROM passengers WHERE ID_Passengers = {$_GET['del_id']}";
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
        <li><a href="index_passengers_admin.php?sort=Surname_aircraft-asc">Фамилия пассажира от А до Я</a></li>
        <li><a href="index_passengers_admin.php?sort=Surname_aircraft-desc">Фамилия пассажира от Я до А</a></li>
        <li><a href="index_passengers_admin.php?sort=default">Фамилия пассажира по умолчанию</a></li>
    </ul>
    <form action="index_passengers_insert.php" method="post">
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
	case 'Surname_aircraft-asc':
		$sorting_sql = 'ORDER BY Type ASC';
		break;
	case 'Surname_aircraft-desc':
		$sorting_sql = 'ORDER BY Type DESC';
		break;
	case 'default':
		$sorting_sql = '';
}
$poisk = $_POST['poisk'];
$reser = $_POST['reset'];
if (empty($poisk))
{
$sql = "SELECT * FROM passengers $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>Код пассажира</td>'.
	'<td>Фамилия</td>'.
  '<td>Имя</td>'.
  '<td>Отчество</td>'.
  '<td>Паспортные данные</td>'.
  '<td>Удаление</td>'.
  '<td>Редактирование</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Passengers']} </td>".
				"<td> {$row['Surname']} </td>".
        "<td> {$row['Name']} </td>".
        "<td> {$row['Patronymic']} </td>".
        "<td> {$row['Passport_data']} </td>".
				"<td><a href='index_passengers_admin.php?del_id={$row['ID_Passengers']}'>Удадить</a> </td>".
				"<td><a href='update_passengers.php?red_id={$row['ID_Passengers']}'>Изменить</a></td>".
				'</tr>';
	}
	echo '</table>';
} else {
	$sqllike = "SELECT * FROM aircraft WHERE ID_Aircraft LIKE '%$poisk%' OR Type LIKE '%$poisk%'";
	$res = mysqli_query($link, $sqllike); echo '<table border=1>'.
	'<tr>'.
	'<td>Код пассажира</td>'.
	'<td>Фамилия</td>'.
  '<td>Имя</td>'.
  '<td>Отчество</td>'.
  '<td>Паспортные данные</td>'.
	'<td>Удаление</td>'.
	'<td>Редактирование</td>'.
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['ID_Passengers']} </td>" .
		"<td> {$row1['Surname']}</td>".
    "<td> {$row1['Name']}</td>".
    "<td> {$row1['Patronymic']}</td>".
    "<td> {$row1['Passport_data']}</td>".
            "<td><a href='index_passengers_admin.php?del_id={$row1['ID_Aircraft']}'>Удадить</a> </td>".
				"<td><a href='update_passengers.php?red_id={$row1['ID_Aircraft']}'>Изменить</a></td>".
		'</tr>';
	}
	echo '</table>';
}
?>
