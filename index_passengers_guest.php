
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

?>
<form action="guest.php" method="POST">
	<input type="submit" value="Вернуться назад">
</form>
