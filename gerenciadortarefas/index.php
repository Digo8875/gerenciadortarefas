<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='content/css/bootstrap.min.css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel='stylesheet' type='text/css' href='content/css/style.css'>
		<title>Gerenciador de tarefas</title>
	</head>
	<body>
		<header>
			<?php
				require_once(dirname(__FILE__)."/view/header.class.php");
				$header = new Header();
				echo"<div>";
					$header->draw();
				echo"</div>";
			?>
		</header>

		<div class='mestra' id='div_mestra'>
			<?php
				require_once(dirname(__FILE__)."/view/tela_home.class.php");
				$home = new Tela_home();
				echo"<div id='conteiner_home'>";
					$home->draw();
				echo"</div>";
			?>
		</div>

		<footer>
			<?php
				require_once(dirname(__FILE__)."/view/footer.class.php");
				$footer = new Footer();
				echo"<div>";
					$footer->draw();
				echo"</div>";
			?>
		</footer>

		<div>
		<script  type='text/javascript' src='content/js/jquery.js'></script>
		<script  type='text/javascript' src='content/js/Main.js'></script>
		<script  type='text/javascript' src='content/js/Init.js'></script>
		</div>
	</body>
</html>