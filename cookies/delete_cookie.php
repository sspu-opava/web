<?php 
	setcookie("name", "", time() - 3600, "/");
	setcookie("browser", "", time() - 3600);
	header("Location: index.php");
?>