<?php
	date_default_timezone_set("Asia/Novosibirsk");
	$postReceiver = $_POST["postReceiver"];
	$post = $_POST["post"];
	session_start();
	$mysql = mysqli_connect("localhost", "root", "", "social");
	mysqli_query($mysql, "INSERT INTO `userposts` (`postAuthor`, `postReceiver`, `postData` ,`postText`) VALUES ('".$_SESSION["user_id"]."', '$postReceiver', '". date("d.m.Y H:i:s") ."', '$post');");
	mysqli_close($mysql);
	header("Location: ../profile.php?id=$postReceiver");
?>