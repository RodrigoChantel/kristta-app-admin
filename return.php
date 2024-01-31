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
<body class="horizontal-bg h-100">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card text-center mx-auto" style="top:35%;">
                    <div class="card-header">
                        <h1 class="fs-5">Mensagem do Sistema</h1>
                    </div>
                    <div class="card-body">
                        <?php
                            error_reporting(0);
                            ini_set('display_errors', 0);

                            $validString = $_GET['postReturn'];

                            if($validString == !null){
                                switch ($validString) {
                                    case 'invoiced':
                                            echo "<p>Fatura gerada com sucesso!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'fail':
                                            echo "<p>Não foi possível prosseguir com a solicitação.</p>";
                                            echo "<a class='btn btn-danger' href='index.php'>Retornar</a>";
                                        break;
                                    case 'paymentSuccess':
                                            echo "<p>Baixa da fatura efetuada com sucesso!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'paymentCancel':
                                            echo "<p>A Fatura foi cancelada!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'paymentReversal':
                                            echo "<p>A Fatura foi estornada!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'insertUserSuccess':
                                            echo "<p>Usuário registrado com sucesso!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'emptyUsers':
                                            echo "<p>Campos vazios não são permitidos!<br>Tente novamente</p>";
                                            echo "<a class='btn btn-danger' href='index.php'>Retornar</a>";
                                        break;
                                    case 'getjobsOk':
                                            echo "<p>A solicitação foi vinculada com sucesso!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'getjobsReturn':
                                            echo "<p>Serviço desvinculado!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    case 'getjobsFinish':
                                            echo "<p>Solicitação concluída com sucesso!</p>";
                                            echo "<a class='btn btn-primary' href='index.php'>Retornar</a>";
                                        break;
                                    default:
                                            echo "<p>por favor tente mais tarde.</p>";
                                            echo "<a class='btn btn-danger' href='index.php'>Retornar</a>";
                                        break;
                                }
                            }else{
                                echo "<p>Fala na comunicação, por favor tente mais tarde.</p>";
                                echo "<a class='btn btn-danger' href='index.php'>Retornar</a>";
                                exit();
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
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