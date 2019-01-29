<?php 
	if (isset($_POST)) {
		setcookie("name", $_POST['name'], time() + (86400 * 30), "/");
		setcookie("browser", $_POST['browser'], time() + (86400 * 30), "/web/cookies");
	}
	header("Location: index.php");
?>