<?php
	date_default_timezone_set("Asia/Novosibirsk");
	$postReceiver = $_POST["postReceiver"];
	$post = $_POST["post"];
	$date = date("d.m.Y H:i:s");
	if(empty($post)) {
		die();
	}
	session_start();
	$mysql = mysqli_connect("localhost", "root", "", "social");
	mysqli_query($mysql, "INSERT INTO `userposts` (`postAuthor`, `postReceiver`, `postData` ,`postText`) VALUES ('".$_SESSION["user_id"]."', '$postReceiver', '". $date ."', '".htmlspecialchars($post)."');");
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


?>
<div style="padding: 5px; border: 1px solid; width: 40%;">
	<a href="profile.php?id=<?=$_SESSION["user_id"];?>" style="<?=($_SESSION["user_id"]==$postReceiver) ? 'color: blue;' : 'color: green'?>">
		<b><?=$_SESSION["name_lastname"];?></b>
	</a>
	<br>
	<span style="color: gray; font-size: 12px;"><?=$date;?></span>
	<br>
	<span style="font-size: 16px; padding: 15px">
	<?php 
		print(htmlspecialchars($post));
		print("<br>");
		
		if (isset($insertNewDocument)) {
			include("../helpers/HTMLRender.php");
			$htmlRenderer->doRender("$documentBase/$filename");
		}
	?>
	</span>
</div>
<br>
