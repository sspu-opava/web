<?php
	// Start the session
	session_start();
	if (isset($_GET['lang'])) $_SESSION['lang'] = $_GET['lang'];
	else $_SESSION['lang'] = "lorem";
?>

<!DOCTYPE html>
<html lang="cs">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Příklad použití sessions</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.jumbotron { margin-bottom: 0; }
		</style>
	</head>
	<body>
		<header class="jumbotron text-center">
			<h1 class="text-uppercase">Sessions</h1>
		</header>
		<nav class="navbar navbar-inverse">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Úvodní stránka <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">Informace</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Volba jazyka <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="?lang=cs">Čeština</a></li>
		            <li><a href="?lang=en">Angličtina</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<main>
			<div class="container">
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Co je PHP Session?</h3>
						</div>
						<div class="panel-body">
						<?php if ($_SESSION['lang']=="en"): ?>
							<p>When you work with an application, you open it, do some changes, and then you close it. This is much like a Session. The computer knows who you are. It knows when you start the application and when you end. But on the internet there is one problem: the web server does not know who you are or what you do, because the HTTP address doesn't maintain state.</p>
							<p>Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.</p>
							<p>So; Session variables hold information about one single user, and are available to all pages in one application.</p>
						<?php elseif ($_SESSION['lang']=="cs"): ?>							
							<p>Session (v překladu relace, sezení nebo seance). Umožňují uchovávat informace spojené s přihlášeným uživatelem, přičemž všechny citlivé informace jsou ukládány bezpečně na serveru - prohlížeče obdrží pouze identifikátor session. Při požadavku využití session PHP zjistí, zda již session neběží. Pokud ne, vytvoří novou, pokud ano, připojí se k existující. Přidělí session identifikátor
							   a vyhradí místo pro ukládání session proměnných. Server si pamatuje obsah každé proměnné zařazené do session.</p>
							<p>Session je možné kdykoli ukončit; vždy se ruší zavřením prohlížeče. Nejtypičtější využití session je identifikace uživatele
							   prostřednictvím přihlášení se ke svému uživatelskému účtu. Session se rovněž používají k dočasnému uložení stavu nákupního košíku.</p>
						<?php else: ?>							
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore blanditiis, tempore perspiciatis, amet cupiditate, iure praesentium expedita sunt ipsa incidunt omnis doloribus, voluptates doloremque odit et debitis deserunt eligendi tenetur.</p>
							<p>Provident, reprehenderit quibusdam neque voluptates. Voluptas earum repellendus asperiores. Iure voluptas eveniet delectus aspernatur voluptatum, numquam, fugiat quis reprehenderit dolorem molestiae voluptate modi ab laborum. Cum hic quas recusandae at deserunt, pariatur officiis molestiae fugit rem, quis odit voluptate.</p>
						<?php endif; ?>							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Uživatel</h3>
						</div>
						<div class="panel-body">
						<?php 
							if (isset($_SESSION['user'])) {
								echo "<h4><a href='".$_SESSION['user']->email."'></a> ".$_SESSION['user']->firstname." ".$_SESSION['user']->surname."</h4>";
								echo "<p>Přihlášen jako ".$_SESSION['user']->role."</p>";
								echo "<p><a href=\"logout.php\">Odhlásit</a></p>";
							} else {
								if (isset($_GET['error'])){
									echo "<p>Přihlášení se nezdařilo!</p>";
								}
								if (isset($_GET['logout'])){
									echo "<p>Uživatel byl odhlášen</p>";
								}
			 			?>

							<form action="login.php" method="POST" role="form">
								<legend>Přihlášení</legend>
							
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="text" class="form-control" name="email" id="email" placeholder="Zadej e-mail">
								</div>
							
								<div class="form-group">
									<label for="password">Heslo</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Zadej heslo">
								</div>							
							
								<button type="submit" class="btn btn-primary">Přihlásit se</button>
							</form>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer>
			<hr>
			<p class="text-center">&copy; SŠPU Opava 2017</p>
		</footer>
		<div class="container">
			<h3>Ladicí výpis obsahu proměnné $_SESSION</h3>
			<?php var_dump($_SESSION) ?>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="skript.js"></script>
	</body>
</html>