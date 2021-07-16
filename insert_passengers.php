<?php
include 'connect.php';
$ID_Passengers = htmlentities(trim($_POST['ID_Passengers']));
$Surname = htmlentities(trim($_POST['Surname']));
$Name = htmlentities(trim($_POST['Name']));
$Patronymic = htmlentities(trim($_POST['Patronymic']));
$Passport_data = htmlentities(trim($_POST['Passport_data']));

if (isset($ID_Passengers) && isset($Surname) && isset($Name) && isset($Patronymic) && isset($Passport_data))
{
	$sql = "INSERT INTO `passengers`(`ID_Passengers`, `Surname`, `Name`, `Patronymic`, `Passport_data`) VALUES ('$ID_Passengers','$Surname','$Name','$Patronymic','$Passport_data')";
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
	<title>Добавление в таблицу данных passengers</title>
</head>
<body>
	<form action="index_passengers_admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
