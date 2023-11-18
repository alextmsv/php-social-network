<?php
	include("helpers/HTMLRender.php");
	session_start();
	$hasUserSession = (!empty($_SESSION["user_id"]));
	$pageTitle = $hasUserSession ? $_SESSION["name_lastname"]. " - Моя соц сеть" : "Моя соц сеть";
?>
<html>	
	<head>
		<link rel="stylesheet" href="css/styles.css?v=<?=time();?>" />
		<title><?=$pageTitle;?></title>
	</head>
	<body>
		<?php if($hasUserSession) {?>
		<button onclick="javascript:document.location.href='editProfile.php'" style="display: inline;">Изменить вашу страницу</button>
		<div style="padding: 5px; border: 1px solid; width: 20%; display: inline;">
			<a href="messages.php" style="color: gray; display: inline; align-text: center;">
				<b title="Посмотреть личные сообщения">Сообщения</b>
			</a>
		</div>
			<span style="font-size: 16px; text-align: right; display: initial; align-text: right;">
				<a href="profile.php?id=<?=$_SESSION["user_id"];?>" style="color: blue">
						<b title="Перейти на ваш профиль"><?=$_SESSION["name_lastname"];?></b>
				</a>

			</span>
			<hr>	
		<?php 
		} else { ?>
			<span style="font-size: 16px; text-align: center; display: block">
				<a href="index.php" style="color: green">
					<b title="Переход на страницу входа/регистрации">Войти в аккаунт!</b>
				</a>
			</span>
			<hr>	
		<?php
		}
		?> 
