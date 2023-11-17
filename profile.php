<?php
	include("blocks/header.php");
	
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
	$description = $resultArray["pDescription"];
?>
		<?="<a class='profileInfo'>$name $lastname</a>";?>		
		<?php 
			print(($_SESSION["user_id"] == $userId) ?  "(<a href='editProfile.php' class='profileDescription' title='Изменить описание вашей страницы?'>$description</a>)" : "<a class='profileDescription'>$description</a>");
			print("<br>");
		?>
		Возраст: <?=$age?><br />
		<?php
			if ($hasUserSession)
				print("<br /><a href='acts/logout.php' class='logout'>Выход</a>");
			else {
				print("<br /><a href='login.php'>Войти</a>");
				exit();
			}
		?>
		<hr/>
		<form action="acts/post.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="postReceiver" value="<?$userId;?>" /> 
			<textarea cols="50" rows="3" name="post" required></textarea><br>
			<input type="file" id="fileInput" name="fileInput">
			<input type="submit" value="Опубликовать"/>
		</form>
		<hr/>
			<?php
				$commentsResult = mysqli_query($mysql, "SELECT * FROM `userposts` WHERE `postReceiver`=$userId");
				
				while (($commentsResultArray = mysqli_fetch_array($commentsResult))  != null ) 
				{
					$postID=$commentsResultArray["postID"];
					$documentsResult = mysqli_query($mysql, "SELECT * FROM `userattachments` WHERE `postId`  = '$postID' ");
					$documentResultArray = mysqli_fetch_array($documentsResult);
					$postAuthor=$commentsResultArray["postAuthor"];
					$postReceiver=$commentsResultArray["postReceiver"];
					$postData=$commentsResultArray["postData"];
					$postText=$commentsResultArray["postText"];	
					$posterQuery = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id` = '$postAuthor'");
					$posterArray = mysqli_fetch_array($posterQuery);
					$posterName = $posterArray["name"]." ". $posterArray["lastname"];
			?>
					<a href="profile.php?id=<?php print($postAuthor	);?>" style="color: green">
						<b><?=$posterName;?></b>
					</a>
					<br>
					<span style="color: gray; font-size: 12px;"><?php print($postData);?></span>
					<br>
					<span style="font-size: 16px; padding: 15px">
						<?php 
						print(htmlspecialchars($postText));
						print("<br>");
						if($documentResultArray != null) {
							$htmlRenderer->doRender($documentResultArray["documentPath"]);
						}
						?>
					</span>
					<hr>
			<?php
				}
			include("blocks/bottom.php");
			mysqli_close($mysql);
?>