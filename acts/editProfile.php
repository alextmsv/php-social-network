<?php
	session_start();
	if(empty($_SESSION["user_id"])) header("Location: ../register.php");
	$newName = $_POST["name"];
	$newLastName = $_POST["lastname"];
	$newPassword = $_POST["newPassword"];
	$newLogin = $_POST["newLogin"];
	$newAge = $_POST["age"];
	$oldPassword = $_POST["password"];
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$resultArray = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `users` WHERE `id`='".$_SESSION["user_id"]."'"));
	if($oldPassword != $resultArray["password"]) die("Вы ввели неверный старый пароль, попробуйте еще раз");
	if(empty($newName)) $newName = $resultArray["name"];
	if(empty($newLastName)) $newLastName = $resultArray["lastname"];
	if(empty($newPassword)) $newPassword = $resultArray["password"];
	if(empty($newLogin)) $newLogin = $resultArray["login"];
	if(empty($newAge)) $newAge = $resultArray["age"];
	$insertNewUserQueryResult = mysqli_query($mysql, "UPDATE `users` SET `login`='$newLogin', `password`='$newPassword', `name`='$newName', `lastname`='$newLastName', `age`='$newAge' WHERE `id`='".$_SESSION["user_id"]."'");
	$_SESSION["name_lastname"] = "$newName $newLastName";
	$_SESSION["login"] = $newLogin;
	header("Location: ../profile.php");
	exit();
?>