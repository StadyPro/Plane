<?php
include 'connect.php';
$ID_Aircraft = htmlentities(trim($_POST['ID_Aircraft']));
$Type = htmlentities(trim($_POST['Type']));

if (isset($aircraft))
{
	$sql = "INSERT INTO aircraft (ID_Aircraft,Type) VALUES ('$ID_Aircraft','$Type')";
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
