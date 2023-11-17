<?php
	include("helpers/HTMLRender.php");
	
	session_start();
	$hasUserSession = (!empty($_SESSION["user_id"]));
	$pageTitle = $hasUserSession ? $_SESSION["name_lastname"]. " - Моя соц сеть" : "Моя соц сеть";
?>
<html>	
	<head>
		<link rel="stylesheet" href="css/styles.css" />
		<title><?=$pageTitle;?></title>
	</head>
	<body>
		<?php if($hasUserSession) {?>
			<span style="font-size: 16px; text-align: right; display: block">
				<button onclick="javascript:document.location.href='editProfile.php'">Изменить вашу страницу</button>
				<a href="profile.php?id=<?=$_SESSION["user_id"];?>" style="color: blue">
						<b title="Перейти на ваш профиль"><?=$_SESSION["name_lastname"];?></b>
				</a>
			</span>
			<hr>	
		<?php 
		}
		?>
