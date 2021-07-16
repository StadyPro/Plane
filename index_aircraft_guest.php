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

$sql = "SELECT * FROM aircraft $sorting_sql";
$result_sql = mysqli_query($link, $sql);
	echo '<table border=1>'.
	'<tr>'.
	'<td>Код самолета</td>'.
	'<td>Тип самолета</td>'.
	'<td>Количество мест</td>'.
	'</tr>';
	while ($row = mysqli_fetch_array($result_sql)) {
		echo
		'<tr>'.
		"<td>{$row['ID_Aircraft']}</td>".
		"<td>{$row['Type']}</td>".
		"<td>{$row['Number_Seats']}</td>".
		'</tr>';
	}
	echo '</table>';
?>
