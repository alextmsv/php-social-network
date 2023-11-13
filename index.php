<?php
	session_start();
	if (!empty($_SESSION["user_id"])) {
		header("Location: profile.php?id=".$_SESSION["user_id"]."");
		exit();
	}
?>
<a href="login.php">Авторизация</a>
<br /><a href="register.php">Регистрация</a>