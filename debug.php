<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    ini_set('log_errors', 1);
    ini_set('error_log', 'arquivo_de_log');


	require_once('Config/auth.php');
    include_once('Controller/ControllerFaturamento.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">
	<link href="Assets/Css/styleHover.css" rel="stylesheet">
    <title>Dashboard</title>

	<style>
		.bgTeste{
			background-image: url('./Assets/Img/bgteste.jpg');
			background-repeat: no-repeat;
			background-position-y: bottom;
			background-size: cover;
		}
	</style>

  </head>

  <body>
    

    <div class="m-0 p-0 w-100">
        
        <?php
            $teste = new Faturamento;
            $teste->gerarFatura();
        ?>
        
    </div>


  </body>

  <script type="text/javascript" src="Assets/js/dropbox.js"></script>
	<script type="text/javascript" src="Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./Assets/js/efect.js"></script>
	<script src="Assets/js/fontawesome.js"></script>
	<script src="Assets/js/popper.min.js"></script>
	<script src="Assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./Assets/js/nav.js"></script>
</html>