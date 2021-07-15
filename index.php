<?php
	session_start();
	include('conn.php');
	 $login = stripslashes(htmlspecialchars(trim($_POST['login'])));
	 $pass = trim($_POST['pass']);
	 if (!empty($login) && !empty($pass))
	 {
	 	$sql = "SELECT `id_access`, `login`, `password`, `access` FROM `access` WHERE `login`='$login' and `password`='$pass'";
	 	$result = mysqli_query($link, $sql);
	 	$row = mysqli_num_rows($result);
	 	if ($row == 0) {
	 		exit("Неверный логин и пароль!");
	 	}
	 	else {
	 		$row1 = mysqli_fetch_array($result);
	 		if($row1['access'] == 'admin')
	 		{
	 			header('Location: admin.php');
	 		}
	 		if($row1['access'] == 'user')
	 		{
	 			header('Location: user.php');
	 		}
	 		if($row1['access'] == 'guest')
	 		{
	 			header('Location: guest.php');
	 		}
	 	}
	 }

	 session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
</head>
<body>
	<form method="post" name="myForm">
		<p>Логин: <input type="text" name="login"></p>
		<p>Пароль: <input type="password" name="pass"></p>
		<input type="submit" name="enter" value="Отправить">
		<input type="reset" value="Выход">
	</form>
</body>
</html>
