<?php
	include_once('Config/auth.php');
	include_once('Controller/showStaff.php');
	require_once('Controller/Solicitacoes.php');
    $teste = new Solicitacoes;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="Assets/Css/custom.css" rel="stylesheet">
	<link href="Assets/Css/style-dashboard.css" rel="stylesheet">
    <link href="Assets/Css/style-botchat.css" rel="stylesheet" type="text/css">
    <link href="Assets/Css/animation.css" rel="stylesheet" type="text/css">
    <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">
    <link href="Assets/Css/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-ico" href="Assets/Img/favteste.webp">
    <script src="./Assets/js/jquery.min.js"></script>
    <title>Dashboard</title>
  </head>
<body class="bg-light h-100">
	<header>
		<div class="container-fluid horizontal-bg">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<div class="row w-100 mx-0">
						<div class="col-md-6">
							<a href="#" class="navbar-brand text-white fw-bold">Kristta<span class="fs-6 fw-normal opacity-50">(Beta V-1.5.1 2023)</span></a>
						</div>
						<div class="col-md-6 text-end mx-0">
							
							<div id="timer" style="display: none;"></div>

							<?php
								$showMoney = new showUsers;
								foreach($showMoney->staff() as $showDataMoney){
							?>
							<a class="btn text-light fw-bold" href="#">R<i class="fa-solid fa-dollar-sign"></i> <?php echo number_format($showDataMoney['STAFF_MONEY'], 2, ',', '.'); ?></a>
							<?php
								}
							?>

							<a href="#" class="btn text-light"><i class="fa-sharp fa-solid fa-bell"></i></a>
							<a href="#" class="btn text-light" disabled><i class="fa-sharp fa-solid fa-envelope"></i></a>
							<!-- INICIO DROP -->
								<button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-sharp fa-solid fa-circle-user"></i>
								</button>
								<ul class="dropdown-menu shadow px-2" style="right:0; left:auto;">
									<p class="fs-1 text-center my-0"><i class="fa-sharp fa-solid fa-circle-user"></i></p>
									<p id="compName" class="fs-5 text-center my-0"><?php echo ucwords($_SESSION['user']); ?></p>

									<p id="compName" class="text-center my-0">( Kristta )</span></p>

									<li>
									<a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#trocarSenhaModal">
										<i class="fa-solid fa-key"></i> Trocar Senha
									</a>
									</li>
									<li><a class="dropdown-item text-center" href="Controller/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
								</ul>
							<!-- FIM DROP -->

						</div>
						
					</div>
				</div>
			</nav>
		</div>
	</header>

	<!-- AVISO -->

	<div id="floatingNotice" class="floating-notice shadow bg-primary px-4" style="display: none;">
		<div class="row pt-0">
			<h2 class="text-white">Olá!</h2>
		</div>
		<div class="row">
			<p class="my-auto text-white">Navegue sem problemas! Limpe a memória cache regularmente para uma experiência perfeita. Estamos aqui para ajudar!</p>
		</div>
		<div class="row pt-3">
			<div class="col-md-12">
				<button onclick="submitWarning()" class="btn bg-white w-25">ENTENDI</button>
			</div>
		</div>
	</div>
		
	<main id="main" style="filter: 0; height:93.2vh;">
		<div class="container-fluid m-0 p-0" style="height:100% !important;">
			<div style="height:100%;" class="container-fluid px-0 m-0 d-flex flex-row flex-nowrap">
				<div class="d-block border border-right border-2 m-0 h-100" id="" scrolling="no">

					<div class="row-menu w-100"><p><button class="btn w-100 text-start text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
						<i class="fa-sharp fa-solid fa-bars"></i>
					</button></p></div>
					<div class="row-menu"><p onclick="Inicio('inicio')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-solid fa-house"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Início</span></a></p></div>
					<div class="row-menu"><p onclick="Solicitacoes('solicitacoes')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-sharp fa-solid fa-ticket fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Solicitações</span></a></p></div>
					<!--<div class="row-menu"><p onclick="Atendimento('atendimento')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-solid fa-user-plus fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Atendimento</span></a></p></div>
					<div class="row-menu"><p onclick="Clientes('clientes')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-sharp fa-solid fa-user-group fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Clientes</span></a></p></div>
					<div class="row-menu"><p onclick="Treinamento('treinamento')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-sharp fa-solid fa-graduation-cap fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Treinamentos</span></a></p></div>
					<div class="row-menu"><p onclick="Compras('compras')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-solid fa-credit-card fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Compras</span></a></p></div>-->
					<?php
						if($_SESSION['user_cargo'] == 1 OR $_SESSION['user_cargo'] == 2 OR $_SESSION['user_cargo'] == 6){
					?>
					<div class="row-menu"><p onclick="Faturamento('faturamento')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-sharp fa-solid fa-money-bill-1-wave fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Faturamento</span></a></p></div>
					<div class="row-menu"><p onclick="Cadastro('cadastro')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-sharp fa-solid fa-id-card fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Cadastro</span></a></p></div>
					<?php } ?>
					<div class="row-menu"><p onclick="Suporte('suporte')"><a class="btn border-0 w-100 text-start text-secondary py-2 d-flex flex-row flex-nowrap"><i class="fa-sharp fa-solid fa-headset fs-5"></i><span class="collapse collapse-horizontal ms-2" id="collapseWidthExample"> Suporte</span></a></p></div>

				</div>
	
				<div class="container-fluid m-0 px-0 overflow-auto h-100" id="inicio" style="display:block;">
					<?php
						include_once('Views/pages/inicio.php')
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="atendimento" style="display:none;">
					<?php
						//include_once('Views/pages/shorts.php');
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="clientes" style="display:none;">
					<?php
						include_once('Views/pages/clientes.php');
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="treinamento" style="display:none;">
					<?php
						include_once('Views/pages/treinamento.php');
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="compras" style="display:none;">
					<?php
						include_once('Views/pages/compras.php');
					?>
				</div>
				
				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="faturamento" style="display:none;">
					<?php
						include_once('Views/pages/faturamento.php');
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="solicitacoes" style="display:none;">
					<?php
						include_once('Views/pages/solicitacoes.php');
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="cadastro" style="display:none;">
					<?php
						if($_SESSION['user_cargo'] == 1 OR $_SESSION['user_cargo'] == 2 OR $_SESSION['user_cargo'] == 6){
							include_once('Views/pages/cadastro.php');
						}
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="suporte" style="display:none;">
					<?php
						include_once('Views/pages/support.php');
					?>
				</div>

				<div class="container-fluid m-0 p-0 overflow-auto h-100" id="workflow" style="display:none;">
					<?php
						include_once('Views/pages/workflow.php');
					?>
				</div>

			</div>

			<!-- Modal de troca de senha -->
			<div class="modal fade" id="trocarSenhaModal" tabindex="-1" aria-labelledby="trocarSenhaModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="trocarSenhaModalLabel">Alterar Senha</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
						</div>
						<div class="modal-body">
							<form onsubmit="return validarFormulario()" action="controller/redirect.php" method="POST">
								<?php
								$sendData = new showUsers();
								$passwords = $sendData->staff();
								foreach ($passwords as $sendPassword) {
									echo "<input type='hidden' id='sendPassword' name='sendPassword' value='" . $sendPassword['CLIENT_PASSWORD'] . "'>";
								}
								?>
								<?php
								$sendClient = new showUsers();
								$client = $sendClient->staff();
								foreach ($client as $sendClients) {
									echo "<input type='hidden' id='sendClient' name='sendClient' value='" . $sendClients['ID'] . "'>";
								}
								?>
								<input type="hidden" id="alterarSenha" name="alterarSenha" value="01820">
								<div class="mb-3">
									<label for="senhaAtual" class="form-label">Senha Atual</label>
									<input type="password" class="form-control" id="senhaAtual" name="senhaAtual">
								</div>
								<div class="mb-3">
									<label for="novaSenha" class="form-label">Nova Senha</label>
									<input type="password" class="form-control" id="novaSenha" name="novaSenha">
								</div>
								<div class="mb-3">
									<label for="repeteNovaSenha" class="form-label">Repita a Nova Senha</label>
									<input type="password" class="form-control" id="repeteNovaSenha" name="repeteNovaSenha">
								</div>
								<div class="alert alert-danger" id="erroSenha" style="display: none;"></div>
								<div class="alert alert-danger" id="vazioSenha" style="display: none;"></div>
								<div class="alert alert-danger" id="erroSenhaAntiga" style="display: none;"></div>
								<button type="submit" class="btn btn-primary">Enviar</button>
								<input type="reset" class="btn btn-secondary" value="Cancelar" data-bs-dismiss="modal"></button>
							</form>
						</div>
					</div>
				</div>
			</div>
 

			<script>
				function validarFormulario() {
					var novaSenha = document.getElementById("novaSenha").value.trim();
					var repeteNovaSenha = document.getElementById("repeteNovaSenha").value.trim();
					var erroSenha = document.getElementById("erroSenha");

					if (novaSenha !== repeteNovaSenha) {
						erroSenha.innerHTML = "A nova senha não corresponde à repetição da nova senha. Por favor, verifique os campos.";
						erroSenha.style.display = "block";
						return false;
					}
					if (novaSenha.length === 0 && repeteNovaSenha.length === 0) {
						vazioSenha.innerHTML = "Campos vazios não são permitidos.";
						vazioSenha.style.display = "block";
						return false;
					}
				}
			</script>

				<!--LIMITAR CARACTERES -->
			<script>
				var paragrafo = document.getElementById("compName");
				var limiteLetras = 20;

				if (paragrafo.textContent.length > limiteLetras) {
					paragrafo.textContent = paragrafo.textContent.substring(0, limiteLetras) + "...";
				}
			</script>

		</div>
		<div id="cookie-aviso" class="alert alert-info rounded-0" role="alert">
			Este site utiliza cookies. Clique em Aceitar para continuar.
			<button id="aceitar-cookie" class="btn btn-primary btn-sm">Aceitar</button>
		</div>
	</main>
	

</body>
	<script src="Assets/js/popper.min.js"></script>
	<script src="Assets/js/nav.js"></script>
	<script src="Assets/js/style.js"></script>
	<script src="Assets/js/script.js"></script>
	<script src="Assets/js/timer.js"></script>
	<script src="Assets/js/floatMsg.js"></script>
	<script src="Assets/js/cookies.js"></script>
	<script src="Assets/js/bootstrap.min.js"></script>
	<script src="Assets/js/fontawesome.js"></script>
	<script src="Assets/js/charts.js"></script>
	<script src="Assets/js/cdnjs.chart.js"></script>
	<script>
		const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
		const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
	</script>

	<!-- AOS -->
	<script src="Assets/js/aos.js"></script>
	<script>
	AOS.init({
	});
	</script>
	

</html>
