<?php
	session_start();
	if(empty($_POST["exFriendID"])) {
		header("Location: ../profile.php");
		exit();
	}
	$exFriend = $_POST["exFriendID"];
	if(empty($_SESSION["user_id"])) header("Location: ../index.php");
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$deleteContact = mysqli_query($mysql, "DELETE FROM `usercontacts` WHERE `contactID`='$exFriend' and `contacterID`='".$_SESSION["user_id"]."'");
	mysqli_close($mysql);
	header("Location: ../profile.php?id=$exFriend");
	exit();
?>