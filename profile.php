<?php
	session_start();
	/*bool */$hasUserSession = (!empty($_SESSION["user_id"]));
	if (empty($_GET["id"])) {
		if ($hasUserSession) {
			header("Location: login.php");
			exit();
		}
		header("Location: profile.php?id=".$_SESSION["user_id"]);
		exit();
	}
	
	$userId = $_GET["id"];
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$result = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id`=$userId;");
	$resultArray = mysqli_fetch_array($result);
	if ($resultArray == null) {
		header("Location: errors/404.php");
		exit();
	}
	
	$name = $resultArray["name"];
	$lastname = $resultArray["lastname"];
	$age = $resultArray["age"];
?>
<html>
	<head>
		<title><?php print("$lastname $name - Моя соц сеть");?></title>
	</head>
	<body>
		Имя: <?php print("$name");?><br />
		Фамилия: <?php print("$lastname");?><br />
		Возраст: <?php print("$age");?><br />
		
		<?php
			if ($hasUserSession)
				print("<br /><a href='acts/logout.php'>Выход</a>");
			else {
				print("<br /><a href='login.php'>Войти</a>");
				exit();
			}
		?>
		<hr/>
		<form action="acts/post.php" method="post">
			<input type="hidden" name="postReceiver" value="<?php print($userId);?>" />
			<textarea name="post"></textarea><br>
			<input type="submit" value="Опубликовать"/>
		</form>
		<hr/>
			<?php
				$commentsResult = mysqli_query($mysql, "SELECT * FROM `userposts` WHERE `postReceiver`=$userId");
				while (($commentsResultArray = mysqli_fetch_array($commentsResult)) != null) 
				{
					$postID=$commentsResultArray["postID"];
					$postAuthor=$commentsResultArray["postAuthor"];
					$postReceiver=$commentsResultArray["postReceiver"];
					$postData=$commentsResultArray["postData"];
					$postText=$commentsResultArray["postText"];
					$posterQuery = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id` = '$postAuthor'");
					$posterArray = mysqli_fetch_array($posterQuery);
					$posterName = $posterArray["name"]." ". $posterArray["lastname"];
			?>
					<a href="profile.php?id=<?php print($postAuthor	);?>" style="color: green">
						<b><?php print($posterName);?></b>
					</a>
					<br>
					<span style="color: gray; font-size: 12px;"><?php print($postData);?></span>
					<br>
					<span style="font-size: 16px; padding: 15px">
						<?php print($postText);?>
					</span>
					<hr>
			<?php
				}
			?>
	</body>
	
</html>
<?php	
	mysqli_close($mysql);
?>