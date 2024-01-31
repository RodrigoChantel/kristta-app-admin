<?php
	require_once('Config/auth.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
<body class="bg-light">
	<?php
		if($_SESSION == true){
			require_once('Views/layout/header.php');
			require_once('Views/layout/content.php');
			require_once('Views/layout/footer.php');
		}else{
			echo "Você não tem permissão para acessar esse conteúdo.";
		}
	?>
</body>
	<script type="text/javascript" src="Assets/js/dropbox.js"></script>
	<script type="text/javascript" src="Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="./Assets/js/efect.js"></script>
	<script src="https://kit.fontawesome.com/87a7f5c1d5.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./Assets/js/nav.js"></script>
</html>

