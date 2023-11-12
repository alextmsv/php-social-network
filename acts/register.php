<?php
	$login = trim($_POST["login"]);
	$passw = trim($_POST["password"]);
	$name = trim($_POST["name"]);
	$lastname = trim($_POST["lastname"]);
	$age = trim($_POST["age"]);
	
	if(empty($login) || empty($passw) || empty($name) || empty($lastname) || empty($age)){
		header("Location: ../register.php");
		exit();
	}
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$userExistsQueryResult = mysqli_query($mysql, "SELECT * FROM `users` WHERE `login`='$login'");
	$userExistsArrayResult = mysqli_fetch_array($userExistsQueryResult);
	if($userExistsArrayResult != null) {
		print("Пользователь с таким же логином ($login) уже существует");
		exit();
	} 
	
	$insertNewUserQueryResult = mysqli_query($mysql, "INSERT INTO `users` 
													(`login`, `password`, `name`, `lastname`, `age`) 
													VALUES ('$login', '$passw', '$name', '$lastname', '$age');");
													
	if (!$insertNewUserQueryResult) {
		print("Ошибка на сервере. Попробуйте зарегистрироваться ещё раз позже!");
		exit();
	}
	header("Location: ../login.php");
	
?>