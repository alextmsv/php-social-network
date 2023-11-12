<?php
	$login = trim($_POST["login"]);
	$passw = trim($_POST["password"]);
	
	if (empty($login) || empty($passw)) {
		header("Location: ../login.php");
		exit();
	}
	
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$result = mysqli_query($mysql, "SELECT * FROM `users` WHERE `login`='$login'");
	$resultArray = mysqli_fetch_array($result);
	
	if ($resultArray == null) {
		print("Неверный логин или пароль!");
		exit();
	}
	
	if ($resultArray["password"] == $passw) {
		session_start();
		$_SESSION["user_id"] = $resultArray["id"];
		$_SESSION["login"] = $login;
		header("Location: ../index.php");
	} else {
		print("Неверный логин или пароль!");
	}
	
	mysqli_close($mysql);
?>