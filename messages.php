<html>
	<head>
	<?php	
		include("blocks/header.php");
	?>
	</head>
	<body>
	<?php
		$mysql = mysqli_connect("localhost", "root", "", "social");
		if(!isset($_GET["id"]))
		{ 
			if (empty($_SESSION["user_id"])) header("Location: index.php");			
			$contactQuery =	mysqli_query($mysql, "SELECT * FROM `usercontacts` WHERE `contacterID`=".$_SESSION["user_id"].";");
			$contactsCount = mysqli_num_rows($contactQuery);
			
			if ($contactsCount <= 0) die("<div class='chat-container'>У вас нет друзей ;(</div>");
	?>
			<div class="chat-container">
				<?php
					while (($contantResult = mysqli_fetch_array($contactQuery)) != null) 
					{
						$contacterQuery = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id`='".$contantResult["contactID"]."'");
						$contacterArray = mysqli_fetch_array($contacterQuery);
				?>
						<div class="chat">
							<a href='messages.php?id=<?=$contacterArray["id"];?>'><?=$contacterArray["name"]; ?></a>
						</div>
				<?php
					}
				?>
			</div>
	<?php } else if($_GET["id"] > 0){
				$interlocutorID = $_GET["id"];
				$query = "SELECT users.id, users.name, users.lastname, usermessages.* FROM users LEFT JOIN usermessages ON users.id = usermessages.msgReceiver WHERE (usermessages.msgReceiver = '$interlocutorID' OR usermessages.msgSender = '$interlocutorID');";
				$result = mysqli_query($mysql, $query);
				$dialogue = mysqli_fetch_array($result);
				$interlocutorName = $dialogue["name"] . " " . $dialogue["lastname"];
		?>
				<div class="chat-container">
					<div class="chat-header">
						<?=$interlocutorName;?>
					</div>
					<div class="chat-messages">
					<?php 
					while(($dialogue = mysqli_fetch_array($result)) != null) { 
						$interlocutorName = $dialogue["name"] . " " . $dialogue["lastname"];
						$dialogueText = $dialogue["msgText"];
						//$isMessageReaded = (var_dump(settype($dialogue["msgReaded"], 'boolean')));
						$messageTime = $dialogue["msgTime"];
					?>
						
							<?=$dialogueText;?><br>
						
					<?php
					}
					?>
					</div>
					<form action="acts/sendMessage.php" method="post">
						<div class="chat-input">
							<input type="text" placeholder="Введите ваше сообщение" name="MessageText" value=""/>
								<input type="hidden" name="MessageReceiver" value="<?=$interlocutorID?>" />
								<button>Отправить</button>
						</div>
					</form>
				</div>
	<?php }?>
	</body>
	
</html>