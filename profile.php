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
			else
				print("<br /><a href='login.php'>Войти</a>");
		?>
		<hr/>
		<form action="acts/post.php" method="post">
			<textarea name="post"></textarea><br>
			<input type="submit" value="Опубликовать"/>
		</form>
		<hr/>
	</body>
	
</html>
<?php	
	mysqli_close($mysql);
?>