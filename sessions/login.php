<?php
	// Start the session
	session_start();
?>
<?php 
	include("Database.php");
	Database::connect("localhost","root","","zaklady");

	if (isset($_POST)) {
		$sql = "SELECT * FROM users WHERE email=? AND password=?";
		$parameteres = array($_POST['email'],md5($_POST['password']));
		if ($user = Database::query($sql,$parameteres)->fetchObject()) {	
			$_SESSION["user"] = $user;
		}
		header("Location: index.php?error=1");
	}
 ?>