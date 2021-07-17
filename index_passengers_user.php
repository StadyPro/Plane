<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Пассажиры</title>
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
        <li><a href="index_passengers_user.php?sort=Surname-asc">Фамилия пассажира от А до Я</a></li>
        <li><a href="index_passengers_user.php?sort=Surname-desc">Фамилия пассажира от Я до А</a></li>
        <li><a href="index_passengers_user.php?sort=default">Фамилия пассажира по умолчанию</a></li>
    </ul>
</body>

</html>
<?php
include 'connect.php';

$sorting = $_GET['sort'];


switch ($sorting) {
	case 'Surname-asc':
		$sorting_sql = 'ORDER BY Surname ASC';
		break;
	case 'Surname-desc':
		$sorting_sql = 'ORDER BY Surname DESC';
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
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo '<tr>'.
				"<td> {$row['ID_Passengers']} </td>".
				"<td> {$row['Surname']} </td>".
        "<td> {$row['Name']} </td>".
        "<td> {$row['Patronymic']} </td>".
        "<td> {$row['Passport_data']} </td>".
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
	'</tr>';
	while ($row1 = mysqli_fetch_array($res)) {
		echo '<tr>' .
		"<td> {$row1['ID_Passengers']} </td>" .
		"<td> {$row1['Surname']}</td>".
    "<td> {$row1['Name']}</td>".
    "<td> {$row1['Patronymic']}</td>".
    "<td> {$row1['Passport_data']}</td>".
		'</tr>';
	}
	echo '</table>';
}
?>
<form action="user.php" method="POST">
	<input type="submit" value="Вернуться назад">
</form>
