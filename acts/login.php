<?php
	$login = trim($_POST["login"]);
	$passw = trim($_POST["password"]);
	
	if (empty($login) || empty($passw)) {
		header("Location: ../login.php?error=NoData");
		exit();
	}
	
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$result = mysqli_query($mysql, "SELECT * FROM `users` WHERE `login`='$login'");
	$resultArray = mysqli_fetch_array($result);
	
	if ($resultArray == null) {
		header("Location: ../login.php?error=NoSuchUser");
		exit();
	}
	
	if ($resultArray["password"] == $passw) {
		session_start();
		$_SESSION["user_id"] = $resultArray["id"];
		$_SESSION["login"] = $login;
		header("Location: ../index.php");
	} else {
		header("Location: ../login.php?error=BadLogin");
	}
	
	mysqli_close($mysql);
?>