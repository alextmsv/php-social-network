<?php
	include("blocks/header.php");
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$contactQuery =	mysqli_query($mysql, "SELECT * FROM `usercontacts` WHERE `contacterID`=".$_SESSION["user_id"].";");
	$contactsCount = mysqli_num_rows($contactQuery);
	$contactResult = mysqli_fetch_array($contactQuery);
	/*
	function showContacts($contacter) {
		$contact = 
	}
	*/
?>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
	<div class="chat-container">
        <div class="chat"><?=$contactsCount <= 0 ? "У вас нет друзей ;(" : mysqli_num_rows($contactQuery);?></div>
    </div>
	</body>
</html>