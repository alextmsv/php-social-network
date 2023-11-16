<?php
	date_default_timezone_set("Asia/Novosibirsk");
	$postReceiver = $_POST["postReceiver"];
	$post = $_POST["post"];
	if(empty($post)) {
		header("Location: ../profile.php?id=$postReceiver");
		exit();
	}
	session_start();
	$mysql = mysqli_connect("localhost", "root", "", "social");
	mysqli_query($mysql, "INSERT INTO `userposts` (`postAuthor`, `postReceiver`, `postData` ,`postText`) VALUES ('".$_SESSION["user_id"]."', '$postReceiver', '". date("d.m.Y H:i:s") ."', '$post');");
	$postId = mysqli_insert_id($mysql); // Get inserted ID of post
	if(!empty($_FILES["fileInput"])) {
		$documentBase = "documentBase";
		$filename = basename($_FILES["fileInput"]["name"]);
		$documentPath = "../".$documentBase ."/". $filename; 
		if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $documentPath))
		{
			$document = file_get_contents($documentPath);
			$mysql = mysqli_connect("localhost", "root", "", "social");
			$insertNewDocument = mysqli_query($mysql, "INSERT INTO userattachments (documentPath, documentOwnerID, postId) VALUES ('$documentBase/$filename', '".$_SESSION["user_id"]."', '$postId');");
		}
	}
	mysqli_close($mysql);
	header("Location: ../profile.php?id=$postReceiver");
?>




<?php
/*
	$documentBase = "../documentBase/";
	$targetPath = $documentBase . basename($_FILES["fileInput"]["name"]); 
	$documentPath = $documentBase . basename($_FILES["fileInput"]["name"]); 
	if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $targetPath))
	{
		$document = file_get_contents($targetPath);
		$mysql = mysqli_connect("localhost", "root", "", "social");
		session_start();
		$insertNewDocument = mysqli_query($mysql, "INSERT INTO userattachments (documentPath, documentOwnerID) VALUES ('$documentPath', '".$_SESSION["user_id"]."')");
		print( "Файл успешно загружен)))");
	} else {
		print( "Че та пошло не так.");
	}
	mysqli_close($mysql);
	*/	
?>
