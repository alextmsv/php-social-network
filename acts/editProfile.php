<?php
	session_start();
	if(empty($_SESSION["user_id"])) header("Location: ../index.php");
	$newName = $_POST["name"];
	$newLastName = $_POST["lastname"];
	$newPassword = $_POST["newPassword"];
	$newLogin = $_POST["newLogin"];
	$newAge = $_POST["age"];
	$repeatPassword = $_POST["repeatPassword"];
	$oldPassword = $_POST["password"];
	$pDescription = $_POST["pDescription"];
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$resultArray = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `users` WHERE `id`='".$_SESSION["user_id"]."'"));
	if(empty($newPassword)) $newPassword = $resultArray["password"];
	else if($newPassword != $repeatPassword) die("Вы неправильно ввели новый пароль");
	if(empty($newName)) $newName = $resultArray["name"];
	if(empty($newLastName)) $newLastName = $resultArray["lastname"];
	if($oldPassword != $resultArray["password"]) die("Неверный пароль");
	if(empty($newLogin)) $newLogin = $resultArray["login"];
	if(empty($newAge)) $newAge = $resultArray["age"];
	if(empty($pDescription)) $pDescription = $resultArray["$pDescription"];
	$insertNewUserQueryResult = mysqli_query($mysql, "UPDATE `users` SET `login`='$newLogin', `password`='$newPassword', `name`='$newName', `lastname`='$newLastName', `age`='$newAge', `pDescription`='$pDescription' WHERE `id`='".$_SESSION["user_id"]."'");
	$_SESSION["name_lastname"] = "$newName $newLastName";
	$_SESSION["login"] = $newLogin;
	header("Location: ../profile.php");
	exit();
?>