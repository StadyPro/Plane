<?php
include 'connect.php';
$ID_Ticket = htmlentities(trim($_POST['ID_Ticket']));

$ID_Flight = array();
$ID_Flight = htmlentities(trim($_POST['ID_Flight']));

$ID_Passenger = array();
$ID_Passenger = htmlentities(trim($_POST['ID_Passenger']));

$Place_Number = htmlentities(trim($_POST['Place_Number']));

$Price = htmlentities(trim($_POST['Price']));

$Departure_Date = htmlentities(trim($_POST['Departure_Date']));

if (isset($ID_Ticket) && isset($ID_Flight)  && isset($ID_Passenger) && isset($Place_Number) && isset($Price) && isset($Departure_Date))
{
	$sql = "INSERT INTO `tickets`(`ID_Ticket`, `ID_Flight`, `ID_Passenger`, `Place_Number`, `Price`, `Departure_Date`) VALUES ('$ID_Ticket','$ID_Flight','$ID_Passenger','$Place_Number','$Price','$$Departure_Date')";
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
	<title>Добавление в таблицу данных tickets</title>
</head>
<body>
	<form action="header.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>
