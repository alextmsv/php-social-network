<?php
	$postReceiver = $_POST["postReceiver"];
	$post = $_POST["post"];
	session_start();
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$doPost = mysqli_query($mysql, "INSERT INTO `userposts` (`postAuthor`, `postReceiver`, `postText`) VALUES ('".$_SESSION["user_id"]."', '$postReceiver', '$post');");
	mysqli_close($mysql);
	header("Location: ../profile.php?id=$postReceiver");
?>