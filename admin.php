<?php
	$exit=$_POST['exit'];
	if(!empty($exit)) {
		unset($_SESSION['login']);
		unset($_SESSION['pass']);
		exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Добавление в таблицу данных</title>
</head>
<body>
	<form action="index_aircraft.php" method="post">
		<input type="submit" name="connect" value="Самолеты">
    </form>
    <form action="index_flights.php" method="post">
		<input type="submit" name="connect" value="Рейсы">
    </form>
    <form action="index_passengers.php" method="post">
		<input type="submit" name="connect" value="Пассажиры">
    </form>
    <form action="index_tickets.php" method="post">
		<input type="submit" name="connect" value="Билеты">
    </form>
</body>
</html>
