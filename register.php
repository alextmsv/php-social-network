<html>
<head>
	<title>Регистрация</title>
</head>
<body>
	<?php
		if (isset($_GET["error"])) {
			$errorType = $_GET["error"];
		
	?>
	<div style="padding: 5px; border: 1px solid; width: 20%; color: red;">
		<?php
			if ($errorType == "NoDataInputed") print("Данные не предоставлены");
			if ($errorType == "UserAlreadyExists") print("Пользователь с таким же именем (".$_GET["login"].") уже существует ");
			if ($errorType == "SQL_Error") print("Ошибка на стороне сервера. Попробуйте зарегистрироваться позже");
			
		?>
	</div>
	<?php
		}
	?>
	<form action="acts/register.php" method="post">
		Логин: <br>
		<input type="text" name="login" placeholder="Логин" required /> <br />
		Пароль: <br>
		<input type="password" name="password" placeholder="Пароль" required /><br />
		
		Ваше имя: <br>
		<input type="text" name="name" placeholder="Имя" required /> <br />
		Ваше Фамилия: <br>
		<input type="text" name="lastname" placeholder="Фамилия" required /> <br />
		
		Ваш возраст: <br>
		<input type="number" name="age" placeholder="Возраст" min="5" max="150" required /> <br />
		
		<input type="submit" value="Зарегистрироваться" />
	</form>
	
</body>
</html>