<?php
include 'connect.php';
$ID_Aircraft = htmlentities(trim($_POST['ID_Aircraft']));
$Type = htmlentities(trim($_POST['Type']));
$Number_Seats = htmlentities(trim($_POST['Number_Seats']));

if (isset($ID_Aircraft) && isset($Type) && isset($Number_Seats))
{
	$sql = "INSERT INTO 'aircraft' (ID_Aircraft, Type, Number_Seats) VALUES ('$ID_Aircraft','$Type','$Number_Seats')";
	$result = mysqli_query($link, $sql);
	if($result)
	{
		echo "Данные успешно добавлены";
	}
	else
	{
		echo "Произошла ошибка: ". mysqli_error($link);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных aircraft</title>
</head>
<body>
	<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
