<?php
    require_once('Controller/Solicitacoes.php');
    $teste = new Solicitacoes;
    
?>
<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>TREINAMENTOS</h6>
            <span>Bem vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>
    <div class="row">
    </div>
</div>