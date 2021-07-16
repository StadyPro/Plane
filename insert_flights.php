<?php
include 'connect.php';

$ID_Flights = htmlentities(trim($_POST['ID_Flights']));

$Destination = htmlentities(trim($_POST['Destination']));

$Departure_Time = htmlentities(trim($_POST['Departure_Time']));

$ID_Plane= array();
$ID_Plane = htmlentities(trim($_POST['ID_Plane']));


if (isset($ID_Flights) && isset($Destination)  && isset($Departure_Time) && isset($ID_Plane))
{
	$sql = "INSERT INTO flights (ID_Flights, Destination, Departure_Time, ID_Plane) VALUES ('$ID_Flights','$Destination','$Departure_Time','$ID_Plane')";
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
	<title>Добавление в таблицу данных flights</title>
</head>
<body>
	<form action="index_flights_admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
