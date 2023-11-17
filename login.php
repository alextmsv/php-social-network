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
	<?php
		if (isset($_GET["error"])) {
			$errorType = $_GET["error"];
	?>
		<div style="padding: 5px; border: 1px solid; width: 20%; color: red;">
	<?php
		if ($errorType == "BadLogin") print("Неверный логин/пароль!");
		if ($errorType == "NoData") print("Данные не предоставлены!");
		if ($errorType == "NoSuchUser") print("Такой пользователь не существует. <a href='register.php'>Зарегистрировать?</a>");
	?>
		</div>
	<?php
		}
	?>
		Авторизация: <br>
		<form action="acts/login.php" method="post">
			Логин: <br>
			<input type="text" name="login" placeholder="Логин" value= "alextmsv"required /><br />
			
			Пароль: <br>
			<input type="password" name="password" placeholder="Пароль" value= "admin" required /><br />
			
			<input type="submit" value="Авторизоваться" />
		</form>
	</body>
</html>