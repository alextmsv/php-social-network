<?php
	session_start();
	$mysql = mysqli_connect("localhost", "root", "", "social");
	date_default_timezone_set("Asia/Novosibirsk");
	$sender = $_SESSION["user_id"];
	$receiver = $_POST["MessageReceiver"];
	$msgText = $_POST["MessageText"];
	$msgTime = date("d.m.Y H:i:s");
	$resultArray = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `usercontacts` WHERE `id`='$sender'"));
	mysqli_query($mysql, "INSERT INTO `usermessages` (`msgSender`, `msgReceiver`, `msgTime` ,`msgReaded`, `msgText`) VALUES ('$sender', '$receiver', '$msgTime', 'false', '".htmlspecialchars($msgText)."');");
	mysqli_close($mysql);
	header("Location: ../messages.php?id=$receiver");
?>