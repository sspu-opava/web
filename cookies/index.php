<?php
	var_dump($_COOKIE);
	$visit = isset($_COOKIE['visit']) ? (int)$_COOKIE['visit'] + 1  : 1;
	$name = isset($_COOKIE['name']) ? $_COOKIE['name']  : "";
	$browser = isset($_COOKIE['browser']) ? $_COOKIE['browser']  : "";
	setcookie("visit", $visit, mktime(18,30,0,1,1,2020));
?>
<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<title>Příklad použití cookies</title>
	<style>
		ul { list-style: none; }
	</style>
</head>
<body>
	<h1>Příklad použití cookies</h1>
	<p>
		Je to tvoje <?php echo $visit; ?>. návštěva této stránky.
	</p>
	<div>
		<h2>Anketa - oblíbený prohlížeč</h2>
		<form name="formular" action="anketa.php" method="post">
			<p><label for="name">Jméno</label>: <input type="text" name="name" id="name"></p>
			<div><label for="browser">Oblíbený prohlížeč</label>: 
				<ul>
					<li><input type="radio" name="browser" id="chrome" value="Chrome"> Google Chrome</li>
					<li><input type="radio" name="browser" id="opera" value="Opera"> Opera</li>
					<li><input type="radio" name="browser" id="firefox" value="Firefox"> Mozilla Firefox</li>
					<li><input type="radio" name="browser" id="ie" value="Internet Explorer"> Internet Explorer</li>
					<li><input type="radio" name="browser" id="jiny" value="jiný"> jiný</li>
				</ul>				
			</div>
			<?php if (!isset($_COOKIE['browser'])): ?>
				<input type="submit" value="Hlasuj">
			<?php else: ?>
				<p>Sorry jako, <b><?php echo $name; ?></b>, už jsi hlasoval. 
				Tvůj oblíbený prohlížeč je <b><?php echo $browser; ?></b></p>
				<p><a href="delete_cookie.php">Smazat cookies</a></p>
			<?php endif; ?>				
		</form>
	</div>
</body>
</html>