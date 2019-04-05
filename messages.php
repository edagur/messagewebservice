<?php
$servername = "eu-cdbr-west-02.cleardb.net";
$username = "b7d8ffaef8f044";
$password = "066e8219";
$dbname = "heroku_529a72a5ae36523";


	if(isset($_GET['hash'])){
		$hash = $_GET['hash'];
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT Hash FROM MessageTable WHERE Hash = '".$hash."' ";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			 // echo  $row['Message'] ;
		}

		$conn->close();
	}
	
	if(isset($_POST['message'])){
		echo "Hash generated:";
		$message = htmlentities($_POST['message']);
		$newHash = hash('sha256', $message);
		echo $newHash;
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "INSERT INTO MessageTable (Message, Hash) VALUES ('".$message."','".$newHash."')";

		if (mysqli_query($conn, $sql)) {
			$result = "Successfully added to database";
		} else {
			$result = "Error while adding to database: " . $sql . "," . $conn->error;
		}
		echo $result;
		$conn->close();
		
	}

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
