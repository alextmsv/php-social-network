<?php
	session_start();
	if (!empty($_SESSION["user_id"])) {
		header("Location: index.php");
		exit();
	}
?>
<html>
	<head>
		<title>Моя соц сеть</title>
	</head>
	<body>
		Авторизация: <br>
		<form action="acts/login.php" method="post">
			Логин: <br>
			<input type="text" name="login" placeholder="Логин" required /><br />
			
			Пароль: <br>
			<input type="password" name="password" placeholder="Пароль" required /><br />
			
			<input type="submit" value="Авторизоваться" />
		</form>
	</body>
</html>