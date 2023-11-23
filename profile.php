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
				<script type="text/javascript">
					function renderHtmlPost(response) {
						var oldPosts = $("#posts").html();
						$("#posts").html(response + oldPosts);
						$("#post").val("");
					}
					
					$(document).ready(function() {
						$("#newPostForm").submit(function(e) {
							e.preventDefault();   
							var formData = new FormData(this);
							$.ajax({
								method: "POST",
								url: "acts/post.php",
								cache: false,
								contentType: false,
								processData: false,
								data: formData
								/*{
									"post": $("#post").val(),
									"postReceiver": "<?=$userId;?>",
								}*/
							}).done(function(response) {
								renderHtmlPost(response);
							}).fail(function(failedResponse) {
								alert(failedResponse);
							});
						});
					});
					function renderFriendRequest(response) {
						
					}
				</script>
				<form id="newPostForm" enctype="multipart/form-data" style="text-align: center; display: block-inline;"> <!-- enctype="multipart/form-data"-->
					<input type="hidden" name="postReceiver" value="<?=$userId;?>" />
					<textarea cols="50" rows="3" name="post" id="post" required></textarea><br>
					<input type="file" id="fileInput" name="fileInput">
					<button>Опубликовать</button>
				</form>
				<hr/>
		<?php
			}
		?>
			<div id="posts">
			<?php
				$wallQuery = mysqli_query($mysql, "SELECT p.*, a.documentPath, u.name, u.lastname FROM `userposts` p LEFT JOIN `users` u ON p.postAuthor = u.id LEFT JOIN `userattachments` a ON p.postID = a.postId WHERE `postReceiver`='$userId' ORDER BY `postID` DESC;");				
				while (($wallArray = mysqli_fetch_array($wallQuery))  != null ) 
				{
					$postID=$wallArray["postID"];
					$postAuthor=$wallArray["postAuthor"];
					$postReceiver=$wallArray["postReceiver"];
					$postData=$wallArray["postData"];
					$postText=$wallArray["postText"];	
					$posterName = $wallArray["name"]." ". $wallArray["lastname"];

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
							if($wallArray["documentPath"] != null) {
								$htmlRenderer->doRender($wallArray["documentPath"]);
							}
							?>
						</span>
					</div>
					<br>
			<?php
				}
			?>
			
			</div>
			<?php
			include("blocks/bottom.php");
			mysqli_close($mysql);
			?>