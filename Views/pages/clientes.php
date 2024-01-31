<?php
    require_once('Controller/Solicitacoes.php');
    $teste = new Solicitacoes;
?>

<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>CLIENTES</h6>
            <span>Bem-vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>

    <div class="row p-0 m-0">

        <div class="col-md-3">
            <div class="card border-primary tesc my-2" style="max-width: 18rem;">
                <div class="card-header">Clientes Cadastrados</div>
                <div class="bg-white border-primary text-primary d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                    <p class="card-title fs-3">00</p>
                    <p class="p-0 m-0"><i class="fas fa-address-book fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-success tesc my-2" style="max-width: 18rem;">
                <div class="card-header">Clientes Ativos</div>
                <div class="bg-white border-success text-success d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                    <p class="card-title fs-3">00</p>
                    <p class="p-0 m-0"><i class="fas fa-check-circle fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-warning tesc my-2" style="max-width: 18rem;">
                <div class="card-header">Clientes Pendentes</div>
                <div class="bg-white border-warning text-warning d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                    <p class="card-title fs-3">00</p>
                    <p class="p-0 m-0"><i class="fas fa-exclamation-circle fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-danger tesc my-2" style="max-width: 18rem;">
                <div class="card-header">Clientes Inadimplentes</div>
                <div class="bg-white border-danger text-danger d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                    <p class="card-title fs-3">00</p>
                    <p class="p-0 m-0"><i class="fas fa-skull-crossbones fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
                </div>
            </div>
        </div>

    </div>

    <div class="row p-0 m-0 my-3">
        <div class="col-md-6">
            <form action="" class="form form-control w-100 py-4">
                <h1 class="title fw-bold fs-5">NOVO CLIENTE</h1>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="nameUser">FANTASIA</label>
                        <input class="form-control" type="text" name="nameUser" placeholder="Digite a Razão Social">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="lastNameUser">RAZÃO SOCIAL</label>
                        <input class="form-control" type="text" name="lastNameUser" placeholder="Digite o Nome Fantasia">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">CNPJ</label>
                        <input class="form-control" type="text" name="cnpj" placeholder="Digite o CNPJ">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">E-MAIL</label>
                        <input class="form-control" type="email" name="emailUser" placeholder="Digite o E-mail">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">TELEFONE</label>
                        <input class="form-control" type="text" name="phone" placeholder="Digite o Telefone">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">WHATSAPP</label>
                        <input class="form-control" type="text" name="whatsapp" placeholder="Digite o Whatsapp">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="label" for="emailUser">REPRESENTANTE</label>
                        <input class="form-control" type="text" name="representative" placeholder="Nome do Representante">
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <input type="submit" class="btn btn-primary" value="CADASTRAR">
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-6">
            <form action="" class="form form-control w-100 py-4">
                <h1 class="title fw-bold fs-5">NOVO REPRESENTANTE</h1>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="nameUser">NOME</label>
                        <input class="form-control" type="text" name="nameUser" placeholder="Digite o Primeiro Nome">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="lastNameUser">SOBRENOME</label>
                        <input class="form-control" type="text" name="lastNameUser" placeholder="Digite o Sobrenome">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">E-MAIL</label>
                        <input class="form-control" type="email" name="emailUser" placeholder="Digite o E-mail">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">CPF</label>
                        <input class="form-control" type="text" name="cpf" placeholder="Digite o CPF">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">TELEFONE</label>
                        <input class="form-control" type="text" name="phone" placeholder="Digite o Telefone">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="label" for="emailUser">WHATSAPP</label>
                        <input class="form-control" type="text" name="whatsapp" placeholder="Digite o Whatsapp">
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
