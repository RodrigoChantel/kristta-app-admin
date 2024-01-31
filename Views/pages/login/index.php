<?php
session_start();

if($_SESSION) {
	header('Location: ./index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../Assets/Css/style.css" rel="stylesheet" type="text/css">
    <link href="../../../Assets/Css/animation.css" rel="stylesheet" type="text/css">
    <link href="../../../Assets/Css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../Assets/Css/custom.css" rel="stylesheet">
    <link rel="icon" type="image/x-ico" href="../../../Assets/Img/favteste.webp">
    <script type="text/javascript" src="../../../Assets/js/jquery-3.3.1.min.js"></script>
    <title>Kristta</title>
</head>
<body class="bg-dark" style="height: 90vh; width:100%;">
    <div class="row">
        <div class="container-fluid position-absolute w-100 text-center">
            <div class="" id="status" role="status"></div>
        </div>
    </div>

    <div class="alert py-1 my-0  w-100" id="alert" role="alert"></div>

    <div class="container-fluid m-0 p-0 d-flex flex-row flex-wrap justify-content-center align-content-center h-100">
        


        <div class="col-xxl-4 col-lg-5">
            <div class="card">

                <!-- Logo -->
                <div class="card-header py-4 text-center horizontal-bg">
                    <a href="index.html">
                        <span><img src="../../../Assets/Img/logo-white.png" alt="logo" height="30"></span>
                    </a>
                </div>

                <div class="card-body p-4">
                    
                    <div class="text-center w-75 m-auto">
                        <h4 class="text-dark-50 text-center pb-0 fw-bold">Gerenciamento</h4>
                        <p class="text-muted mb-4">Entre com seu Usuário e Senha de Acesso.</p>
                    </div>

                    <form  onsubmit="return validarLogin()" action="../../../Controller/Redirect.php" method="POST">

                        <input type="hidden" name="loginDashboard" value="auth2022">

                        <div class="mb-3">
                            <label for="usuario" class="form-label">CPF/CNPJ</label>
                            <input class="form-control" type="text" name="usuario" id="usuario" required="" placeholder="Apenas números">
                        </div>

                        <div class="mb-3">
                            <a href="pages-recoverpw.html" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-muted float-end"><small>Esqueceu sua senha?</small></a>
                            <label for="Senha" class="form-label">Senha</label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <span class="password-eye"><i class="fa-solid fa-eye"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class="alert alert-danger mt-3" id="emptyLogin" style="display: none;"></div>

                        <div class="mb-3 mb-0 text-center">
                            <button class="btn btn-primary" type="submit"> Entrar </button>
                            <a class="btn btn-secondary" href="../index.php">Voltar Para o Site</a>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Mau funcionamento? <a href="#" class="text-muted ms-1"><b>Contate-nos</b></a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>



        <!-- Modal Recuperar Senha -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar senha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return validarRecSenha()" class="w-100" id="recAccount" action="./Controller/Redirect.php" method="POST">
                        <input type="hidden" name="recPw" value="rec">
                        <div class="mx-auto">
                            <label class="form-labe m-0 p-0" for="cpfOrCnpj">CPF ou CNPJ</label>
                            <input class="form-control notscrollnumber" type="number" name="cpfOrCnpj" id="cpfOrCnpj" placeholder="Apenas números">
                        </div>
                        <div class="mx-auto">
                            <div class="alert alert-danger mt-3" id="emptyData" style="display: none;"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="recAccount" class="btn btn-primary">Enviar</button>
                </div>
                </div>
            </div>
        </div>

    </div>

</body>
<script>
    function validarRecSenha() {
        var cpfcnpj = document.getElementById("cpnOrCnpj").value.trim();

        if (cpfcnpj.length === 0) {
            emptyData.innerHTML = "Campos vazios não são permitidos.";
            emptyData.style.display = "block";
            return false;
        }
    }
    function validarLogin() {
        var usuario = document.getElementById("usuario").value.trim();
        var senha = document.getElementById("senha").value.trim();

        if (usuario.length === 0 && senha.length === 0) {
            emptyLogin.innerHTML = "Campos vazios não são permitidos.";
            emptyLogin.style.display = "block";
            return false;
        }
    }
</script>

<!-- Mostrar senha -->
<script>
  var passwordInput = document.getElementById("senha");
  var toggleButton = document.getElementById("togglePassword");
  
  toggleButton.addEventListener("click", function() {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleButton.classList.add("active");
    } else {
      passwordInput.type = "password";
      toggleButton.classList.remove("active");
    }
  });
</script>


<script src="../../../Assets/js/popper.min.js"></script>
<script src="../../../Assets/js/style.js"></script>
<script src="../../../Assets/js/bootstrap.min.js"></script>
<script src="../../../Assets/js/fontawesome.js" crossorigin="anonymous"></script>
<script> const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));</script>
</html>

