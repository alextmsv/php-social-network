<?php
	session_start();
	if(empty($_SESSION)) header("Location: register.php");
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$resultArray = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `users` WHERE `id` = '".$_SESSION["user_id"]."'"));
	$name = $resultArray['name'];
	$lastname = $resultArray['lastname'];
	$age = $resultArray['age'];
	
?>
<html>
<head>
	<title>Изменить профиль - <?php print($_SESSION["name_lastname"]);?></title>
</head>
<body>
	<script type="text/javascript">
		function passwordValidate() {
			
			var newpassword = document.getElementsByName("newPassword")[0].value;
			var re = document.getElementsByName("repeatPassword")[0].value;
			document.getElementsByName("submit")[0].disabled = ((newpassword.length == 0 || newpassword != re));
		}
	</script>
	<form action="acts/editProfile.php" method="post">
		Изменить имя на: <br>
		<input type="text" name="name" value="<?php print($name);?>" maxlength="32" /> <br />
		Изменить фамилию на: <br>
		<input type="text" name="lastname" value="<?php print($lastname);?>" maxlength="32" /> <br />
		Изменить возраст на: <br>
		<input type="number" name="age" value="<?php print($age);?>" min="5" max="150" /> <br />
		<hr>
		Ваш новый логин: <br>
		<input type="text" name="newLogin"/> <br />
		Ваш новый пароль: <br>
		<input type="password" onKeyUp="javascript:passwordValidate()" name="newPassword" /><br />
		Повторите новый пароль: <br>
		<input type="password" onKeyUp="javascript:passwordValidate()" name="repeatPassword"/> <br />
		Ваш старый пароль: <br>
		<input type="password" name="password" /><br />
		<input type="submit" name="submit" disabled="true" value="Изменить страницу" />
	</form>
</body>
</html>