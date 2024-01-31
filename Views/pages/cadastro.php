<?php
    @require_once('Controller/Solicitacoes.php');
    @require_once('Controller/Atender.php');
    @require_once('Controller/MeusAtendimentos.php');
?>

<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>CADASTRO</h6>
            <span>Bem-vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="Controller/Redirect.php" class="form form-control w-100 py-4" method="POST">
                <h1 class="title fw-bold fs-5">NOVO FUNCIONÁRIO</h1>
                <?php
                    if($_SESSION['user_cargo'] == 1 OR $_SESSION['user_cargo'] == 2 OR $_SESSION['user_cargo'] == 6){
                ?>
                <input type="hidden" name="validNewUser" value="newUserValid">
                <?php } ?>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="nameUser">NOME</label>
                        <input class="form-control" type="text" name="nameUser" id="nameUser" placeholder="Digite o Primeiro Nome">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="lastNameUser">SOBRENOME</label>
                        <input class="form-control" type="text" name="lastNameUser" id="lastNameUser" placeholder="Digite o Sobrenome">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="userName">USUÁRIO</label>
                        <input class="form-control" type="text" name="userName" id="userName" placeholder="Digite o Usuário">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="password">SENHA</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Digite a Senha">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="label" for="emailUser">E-MAIL</label>
                        <input class="form-control" type="email" name="emailUser" id="emailUser" placeholder="Digite o E-mail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="functionUser">CARGO / FUNÇÃO</label>
                        <select id="functionUser" name="functionUser" class="form-select">
                            <option class="d-none" value="">Selecione o Cargo</option>
                            <?php
                                if($_SESSION['user_cargo'] == 1 OR $_SESSION['user_cargo'] == 2){
                            ?>
                            <option value="1">Administrador</option>
                            <?php
                                }
                            ?>
                            <option value="2">Desenvolvedor</option>
                            <option value="3">Design</option>
                            <option value="4">Gestor de Marketing</option>
                            <option value="5">Vendedor</option>
                            <option value="5">Aux. Administrativo</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="nascimento">Data de Nascimento</label>
                        <input class="form-control" type="date" name="nascimento" id="nascimento" placeholder="Informe a data de nascimento">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="Cpf">CPF</label>
                        <input class="form-control" type="text" name="Cpf" id="Cpf" placeholder="Informe o CPF (Somente números)">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="Cpf">RG</label>
                        <input class="form-control" type="text" name="Rg" id="Rg" placeholder="Informe o RG (Somente números)">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="label" for="chavePix">Chave Pix</label>
                        <input class="form-control" type="text" name="chavePix" id="chavePix" placeholder="Informe a chave pix">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <input type="submit" class="btn btn-primary" value="CADASTRAR">
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>
