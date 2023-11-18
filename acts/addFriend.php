<?php
	session_start();
	if(empty($_POST["newFriendID"])) {
		header("Location: ../profile.php");
		exit();
	}
	$newFriend = $_POST["newFriendID"];
	if(empty($_SESSION["user_id"])) header("Location: ../index.php");
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$contactCheck = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `usercontacts` WHERE `contactID`='$newFriend' and `contacterID`='".$_SESSION["user_id"]."'"));
	if ($contactCheck != null) die("Этот пользователь уже у вас в друзьях");
	$addNewContact = mysqli_query($mysql, "INSERT INTO `usercontacts` (`contactID`, `contacterID`) VALUES ('$newFriend', '".$_SESSION["user_id"]."')");
	mysqli_close($mysql);
	header("Location: ../profile.php?id=$newFriend");
	exit();
?>