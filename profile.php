<?php
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$userId = $_GET["id"];
	
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
	</body>
</html>
<?php	
	mysqli_close($mysql);
?>