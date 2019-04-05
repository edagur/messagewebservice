<?php
	if(isset($_GET['hash'])){
		//print_r($_GET);
		$name = $_GET['hash'];
		//echo $hash;
	}
	
	if(isset($_POST['message'])){
		print_r($_POST);
		$name = htmlentities($_POST['message']);
		echo hash('sha256', $name);;
	}
/*
	if(isset($_REQUEST['name'])){
		//print_r($_REQUEST);
		$name = htmlentities($_REQUEST['name']);
		echo $name;
	}
	
	echo $_SERVER['QUERY_STRING'];
	*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Messages Web Service</title>
	</head>
<body>
	<form method="POST" action="messages.php">
		<div>
			<label>Enter message you want to hash</label><br>
			<input type="text" name="message">
		</div>
		<input type="submit" value="Submit">
	</form>
		<form method="GET" action="messages.php">
		<div>
			<label>Enter the hash you want to decrypt</label><br>
			<input type="text" name="hash">
		</div>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
