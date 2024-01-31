<?php
    require_once('Controller/Solicitacoes.php');
    $teste = new Solicitacoes;
    
?>
<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>SUPORTE</h6>
            <span>Bem vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>
    <div class="row">
    
        <div class="position-absolute" id="spinner" style="left:50%; top:50%; display:none; z-index:999;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="row pb-3">
                    <div class="col-md-12">
                        <button class="btn bg-white border position-relative">
                            Criar Nova Solicitação
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" style="z-index:999;">
                                !
                            </span>
                        </button>
                        <button class="btn bg-white border">
                            Acompanhar
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="requestsForm">
                            <form id="requestForm" action="controller/redirect.php/" method="post">
                                <input type="hidden" name="formRequest" value="sendRequest">
                                <!-- Envia o ID de usuário atual -->

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="row mb-3">
                                            <div class="mb-3">
                                                <label class="m-0 p-0" for="">Tipo de solicitação</label>

                                                <select class="form-control" name="requeType" id="requeType">
                                                    <option class="d-none text-secondary" value="0" selected>Clique para selecionar uma opção</option>
                                                    <option class='d-none text-secondary'>

                                                    </option>
                                                </select>

                                            </div>

                                            <div class="mb-3">
                                                <label class="m-0 p-0" for="">Solicitante: </label>
                                                <?php echo "<span class='text-danger'>" . ucwords($_SESSION['user']) , "</span>"; ?>
                                            </div>

                                            <div class="mb-3">
                                                <label class="m-0 p-0" for="">Detalhes da Solicitação</label>
                                                <textarea name="msg" id="msg" rows="10" cols="40" maxlength="500" class="form-control" ></textarea>
                                            </div>

                                        </div>
                                    </div> <!-- end col-->
                                    
                                    <div class="col-xl-6">
                                        <div class="row mb-3">
                                            <div class="mb-3">
                                                <div class="alert alert-warning" role="alert">
                                                    IMPORTANTE!<br>
                                                    Caso se faça necessário, adicione print do ocorrido.
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFileMultiple" class="form-label">Selecione os arquivos</label>
                                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                                </div>
                                                <small class="text-muted">Em caso de urgência, ligue para (79) 9 9934-5626</small>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Baixa prioridade
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Alta prioridade
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- end col-->
                                </div><!-- end row -->
                            </form> <!-- End form -->

                            <div class="row mx-0">
                                <div class="col-md-12 px-0">
                                    <button type="submit" form="requestForm" class="btn btn-primary mx-0" onclick="aguardarTresSegundosRequest()">Enviar</button>
                                    <button type="reset" form="requestForm" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>

    </div>
</div>