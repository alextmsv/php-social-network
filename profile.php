<?php
	include("blocks/header.php");
	
	if (empty($_GET["id"])) {
		if (!$hasUserSession) {
			header("Location: index.php");
			exit();
		}
		header("Location: profile.php?id=".$_SESSION["user_id"]);
		exit();
	}
	if(!is_numeric($_GET["id"])) die("Некорректный айди пользователя (содержит посторонние символы)");
	$userId = $_GET["id"];
	$mysql = mysqli_connect("localhost", "root", "", "social");
	$result = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id`=".htmlspecialchars($userId).";");
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
			if($hasUserSession) {
				print(($_SESSION["user_id"] == $userId) ?  "<a href='editProfile.php' class='profileDescription' title='Изменить описание вашей страницы?'>$description</a>" : "<a class='profileDescription'>$description</a>");
				print("<br>");
			} else print("<a class='profileDescription'>$description</a><br>");
		?>
		Возраст: <?=$age?><br />
		<hr/>	 	
		<?php
			($hasUserSession) ? print('<span class="logout"><a href="acts/logout.php" style="color: red;">Выйти</a></span><hr>') :  print('<a href="login.php" class="login">Войти</a><hr>');	
		?>	
		
		<br>
		<?php 
			if($hasUserSession) {
		?>
			<?php if($_SESSION["user_id"] != $userId) {
				$contactCheck = mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM `usercontacts` WHERE `contactID`='$userId' and `contacterID`='".$_SESSION["user_id"]."'"));
				if ($contactCheck == null){ ?>
				<form action="acts/addFriend.php" method="post" style="text-align: center; display:inline;">
					<input type="hidden" name="newFriendID" value="<?=$userId;?>" /> 
					<button>Добавить в друзья</button>
				</form>
				<?php 
				} else {
				?>
				<form action="acts/removeFriend.php" method="post" style="text-align: center; display:inline;">
					<input type="hidden" name="exFriendID" value="<?=$userId;?>" /> 
					<button>Удалить из друзей</button>
				</form>
			<?php 
				} 
			}
			?>
				<form action="acts/post.php" method="post" enctype="multipart/form-data" style="text-align: center; display: block-inline;">
					<input type="hidden" name="postReceiver" value="<?=$userId;?>" /> 
					<textarea cols="50" rows="3" name="post" required></textarea><br>
					<input type="file" id="fileInput" name="fileInput">
					<input type="submit" value="Опубликовать"/>
				</form>
				<hr/>
		<?php
			}
		?>
		
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
					<div style="padding: 5px; border: 1px solid; width: 40%;">
						<a href="profile.php?id=<?=$postAuthor;?>" style="<?=($postAuthor==$userId) ? 'color: blue;' : 'color: green'?>">
							<b><?=$posterName;?></b>
						</a>
						<br>
						<span style="color: gray; font-size: 12px;"><?=$postData;?></span>
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
					</div>
					<br>
			<?php
				}
			include("blocks/bottom.php");
			mysqli_close($mysql);
?>