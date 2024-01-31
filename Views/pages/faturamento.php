<?php
    require_once('Controller/Solicitacoes.php');
    require_once('Controller/ControllerFaturamento.php');

    $solicitacoes = new Solicitacoes;
    $faturamento = new Faturamento;

    
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
        <div class="row pt-3">
            <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
                <h6>FATURAMENTO</h6>
                <span>Bem vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
            </div>
            <hr>
        </div>

        <div class="row px-3">

        <div class="col-md-12">
            <div class="card bg-white shadow w-100">
                <div class="card-header">
                    <h3 class="p-0 m-0 fs-5 text-danger"> Painel </h3>
                </div>
                <div class="card-body">
                    <button onclick="emitirFaturas('emitirF')" class="btn btn-primary">Emitir Faturas</button>
                    <button onclick="faturasEmitidas('emitidasF')" class="btn btn-primary">Faturas Emitidas</button>
                </div>
            </div>
        </div>

        <div id="emitirF" class="col-md-9 my-4">
            <card class="card bg-white shadow">
                <div class="card-header">
                    <div class="d-flex flex-row flex-nowrap justify-content-between align-items-center">
                        <div>
                            <h3 class="p-0 m-0 fs-5"><i class="fa-solid fa-dollar-sign"></i> Emissor de Faturas</h3>
                        </div>
                        <div>
                            <input form="faturamentoForm" type="submit" class="btn btn-success me-3" value="FATURAR">
                        </div>
                    </div>
                    
                </div>
                <div class="card-body overflow-auto" style="height:auto !important;">
                    <form id="faturamentoForm" class="row" action="Controller/Redirect.php" method="post">

                        <input type="hidden" name="faturamento" value="faturar">

                        <div class="col-md-4">
                            <label for="clienteFaturamento">Faturamento</label>
                            <input name="clienteFaturamento" id="clienteFaturamento" class="form-control" type="month">
                        </div>

                        <div class="col-md-4">
                            <label for="finalDate">Vencimento</label>
                            <input name="finalDate" id="finalDate" class="form-control" type="date">
                        </div>

                        <div class="col-md-12">
                            <label for="clienteSelect">Selecione o Cliente:</label>
                            <select name="companySelect" class="form-select" aria-label="Default select example" id="clienteSelect" onchange="atualizarTabela()">
                                <option class="d-none" value="0" selected>Selecione o Cliente</option>
                                <?php
                                    // Código PHP para buscar a lista de clientes do banco de dados e exibir no select
                                    include_once 'Controller/table/buscar_clientes.php';
                                    $clientes = buscarClientes();
                                    foreach ($clientes as $cliente) {
                                        echo "<option value='" . $cliente['COMP_ID'] . "'>" . $cliente['COMP_FANTASY_NAME'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div id="tabela"class="col-md-12 my-3 rounded overflow-auto bg-light border border-1 bg-opacity-25 mx-auto" style="height: 350px; width:98%">
                        </div>
                            <h4 class="mb-0">Planos Ativos</h4>
                        <div id="tabela2"class="col-md-12 mb-3 rounded overflow-auto bg-light border border-1 bg-opacity-25 mx-auto" style="height: 350px; width:98%">
                        </div>
                        

                    </form>
                </div>
            </card>
        </div>

        <div class="col-md-3 py-4 p-0 d-md-block d-lg-block d-none">
            <div class="w-75 mx-auto">
                <h3>Todos os serviços cobrados listados</h3>
                <img class="w-100 mt-3 h-auto" src="Assets/Img/illustrations/undraw_transfer_money_re_6o1h.svg" alt="">
            </div>
        </div>

        <div id="emitidasF" class="col-md-9 my-4" style="display: none;">
            <card class="card bg-white shadow">
                <div class="card-header">
                    <h3 class="p-0 m-0 fs-5"><i class="fa-solid fa-dollar-sign"></i> Faturas Emitidas</h3>
                </div>
                <div class="card-body overflow-auto" style="height: 53vh;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">VALOR</th>
                                <th scope="col">FATURAMENTO</th>
                                <th scope="col">VENCIMENTO</th>
                                <th scope="col">ESTORNAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($_SESSION['user_cargo'] == 1 OR $_SESSION['user_cargo'] == 2 OR $_SESSION['user_cargo'] == 6){
                                foreach($faturamento->joinFaturasEmpresas() as $fatList){
                            ?>
                            <tr>
                                <td><?php echo $fatList['COMP_FANTASY_NAME']; ?></td>
                                <td><?php echo "R$ " . number_format($fatList['INV_VALUE'], 2, ',', '.'); ?></td>
                                <td><?php echo $fatList['INV_INVOICING']; ?></td>
                                <td><?php echo $fatList['INV_VALIDATE']; ?></td>
                                <td class="d-flex flex-row flex-nowrap justify-content-evenly">
                                    <?php
                                        if($fatList['INV_STATUS'] == 0){
                                            echo "<a class='btn btn-success text-center' href='./Controller/Redirect.php?payInvoice=returnPayInvoice&openinvoice={$fatList['INV_ID']}'>BAIXAR</a>";
                                            echo "<a class='btn btn-danger text-center' href='./Controller/Redirect.php?cancelInvoice=returnCancelInvoice&invoicing={$fatList['INV_INVOICING']}&company={$fatList['COMP_ID']}&openinvoiceCancel={$fatList['INV_ID']}'>CANCELAR</a>";
                                        }else{
                                            echo "<a class='btn btn-secondary text-center' disabled>BAIXAR</a>";
                                            echo "<a class='btn btn-danger text-center' href='./Controller/Redirect.php?ReversalInvoice=returnReversalInvoice&openinvoiceReversal={$fatList['INV_ID']}'>ESTORNAR</a>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </card>
        </div>

    </div>
</div>

<script>
    function atualizarTabela() {
        var clienteId = document.getElementById('clienteSelect').value;
        var clienteFaturamento = document.getElementById('clienteFaturamento').value;

        $.ajax({
            url: 'Controller/table/obter_dados_tabela.php',
            type: 'POST',
            data: { clienteId: clienteId, clienteFaturamento: clienteFaturamento },
            success: function(data) {
                $('#tabela').html(data); // Atualiza a div com os novos dados retornados pelo PHP
            },
            error: function(error) {
                console.log(error);
            }
        });

        $.ajax({
            url: 'Controller/table/obter_dados_tabela2.php',
            type: 'POST',
            data: { clienteId: clienteId, clienteFaturamento: clienteFaturamento },
            success: function(data) {
                $('#tabela2').html(data); // Atualiza a div com os novos dados retornados pelo PHP
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>