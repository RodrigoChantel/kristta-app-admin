<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="http://localhost/poo.curso/Assets/Css/styleHover.css" rel="stylesheet">
    <title>Dashboard</title>
  </head>
<body class="bg-light" style="height: 90vh; width:100%;">

    <div class="container-fluid m-0 p-0 d-flex flex-row flex-wrap justify-content-center align-content-center h-100">
        <form class="form form-control w-25 shadow" action="../../../Controller/Redirect.php" method="POST" style="min-width: 350px;">
            <input type="hidden" name="loginDashboard" value="auth2022">
            <h4 class="my-3 text-center">KRISTTA</h4>
            <label class="form-label" for="usuario">USUÁRIO</label>
            <input class="form-control text-secondary" placeholder="Digite seu usuário" type="text" name="usuario" id="usuario">
            <label class="form-label mt-3" for="senha">SENHA</label>
            <input class="form-control text-secondary" placeholder="Digite sua senha" type="password" name="senha" id="senha">
            <div class="w-100 my-4 d-flex flex-row flex-wrap justify-content-between align-items-center">
                <input class="btn btn-primary" type="submit" value="LOGIN">
                <a href="#" class="link text-decoration-none text-secondary">Esqueci minha senha</a>
            </div>
        </form>
    </div>

</body>
    <script src="./Assets/js/efect.js"></script>
	<script src="https://kit.fontawesome.com/87a7f5c1d5.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
