<?php
	session_start();
	print("Hello, World!");
	
	if (!empty($_SESSION["user_id"])) {
?>
	<br /><a href="acts/logout.php">Выход</a>
<?php 
	}
	else
	{
?>
	<br /><a href="register.php">Регистрация</a>
	<br /><a href="login.php">Авторизация</a>
<?php	
	}
?>