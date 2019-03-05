<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='/cvssistemasv2/content/css/bootstrap.min.css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel='stylesheet' type='text/css' href='/cvssistemasv2/content/css/style.css'>
		<title>Gerenciador de tarefas</title>
	</head>
	<body>
		<header>
			<?php
				require_once(dirname(__FILE__)."/../header.class.php");
				$header = new Header();
				echo"<div>";
					$header->draw();
				echo"</div>";
			?>
		</header>

		<div class='mestra' id='div_mestra'>
			<?php
				require_once(dirname(__FILE__)."/lista_usuario.class.php");
				$usuario = new Lista_usuario();
				echo"<div id='conteiner_usuario'>";
					$usuario->draw();
				echo"</div>";
			?>
		</div>

		<footer>
			<?php
				require_once(dirname(__FILE__)."/../footer.class.php");
				$footer = new Footer();
				echo"<div>";
					$footer->draw();
				echo"</div>";
			?>
		</footer>

		<div>
		<script  type='text/javascript' src='/cvssistemasv2/content/js/jquery.js'></script>
		<script  type='text/javascript' src='/cvssistemasv2/content/js/Main.js'></script>
		<script  type='text/javascript' src='/cvssistemasv2/content/js/Init.js'></script>
		</div>
	</body>
</html>