<?php
	include("blocks/header.php");
	if(empty($_SESSION)) header("Location: register.php");
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$resultArray = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `users` WHERE `id` = '".$_SESSION["user_id"]."'"));
	$name = $resultArray['name'];
	$lastname = $resultArray['lastname'];
	$age = $resultArray['age'];
	$description = $resultArray['pDescription'];
	
?>

	<form action="acts/editProfile.php" method="post">
		<div class='humanDesc'>
			Расскажите о себе:
			<br /> 
			<textarea name="pDescription"><?php htmlspecialchars($description); ?></textarea> 
		</div>
		Изменить имя на: <br>
		<input type="text" name="name" value="<?php htmlspecialchars(name);?>" maxlength="32" /> <br />
		Изменить фамилию на: <br>
		<input type="text" name="lastname" value="<?php htmlspecialchars($lastname);?>" maxlength="32" /> <br />
		Изменить возраст на: <br>
		<input type="number" name="age" value="<?php htmlspecialchars(age);?>" min="5" max="150" /> <br />
		<hr>
		Ваш новый логин: <br>
		<input type="text" name="newLogin" maxlength="32" /> <br />
		Ваш новый пароль: <br>
		<input type="password" name="newPassword" /><br />
		Повторите новый пароль: <br>
		<input type="password" name="repeatPassword"/> <br />
		Ваш текущий пароль: <br>
		<input type="password" name="password" /><br />
		<input type="submit" name="submit" value="Изменить страницу" />
	</form>
<?php
	include("blocks/bottom.php");
?>