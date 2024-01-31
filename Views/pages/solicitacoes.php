<?php
    require_once('Controller/Solicitacoes.php');
    $teste = new Solicitacoes;
    $listKrt = new showUsers;

    $totalLinhas = new showUsers;
    $totalLinhas = $totalLinhas->reqOpen();
    
?>
<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>SOLICITAÇÕES</h6>
            <span>Bem vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>

    <div class="row px-3 justify-content-between">
        
        <div class="card border-primary tesc my-2" style="max-width: 18rem;">
            <div class="card-header">TOTAL ATENDIDAS</div>
            <div class="bg-white border-primary text-primary d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                <?php
                    $atendidasGeral = $listKrt->reqSuccess();
                ?>
                <p class="card-title fs-3"><?php echo $atendidasGeral; ?></p>
                <p class="p-0 m-0"><i class="fa-solid fa-clipboard-check fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

        <div class="card border-success tesc my-2" style="max-width: 18rem;">
            <div class="card-header">ATENDIDAS POR MIM</div>
            <div class="bg-white border-success text-success d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                <?php
                    $atendidasUser = $listKrt->reqSuccessUser();
                ?>
                <p class="card-title fs-3"><?php echo $atendidasUser; ?></p>
                <p class="p-0 m-0"><i class="fa-solid fa-circle-check fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

        <div class="card border-danger tesc my-2" style="max-width: 18rem;">
            <div class="card-header">EM ATRASO</div>
            <div class="bg-white border-info text-danger d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                <?php
                    $showUsersObj = new showUsers;
                    $totalLinhas2 = $showUsersObj->reqOpenAway();
                ?>
                <p class="card-title fs-3"><?php echo $totalLinhas2; ?></p>
                <p class="p-0 m-0"><i class="fas fa-calendar-days fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

        <div class="card border-warning tesc my-2" style="max-width: 18rem;">
            <div class="card-header">REQUISIÇÕES PENDENTES</div>
            <div class="bg-white border-warning text-warning d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                
                <p class="card-title fs-3"><?php echo $totalLinhas; ?></p>
                <p class="p-0 m-0"><i class="fas fa-clipboard-check fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

    </div>
    
    <section>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card bg-white shadow w-100">
                    <div class="card-header">
                        <h3 class="p-0 m-0 fs-5 text-danger"> Painel </h3>
                    </div>
                    <div class="card-body">                                                                                         <!-- Espaço para modais de gerenciamento das solicitações em aberto -->
                        
                        <!-- Button create new request -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaSolicitacao">
                          Criar Solicitação
                        </button>
                        
                        <!-- New request -->
                        <div class="modal fade" id="novaSolicitacao" tabindex="-1" aria-labelledby="labelSolicitacao" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="labelSolicitacao">Criar Nova Solicitação</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row mt-3">
        <div class="col-md-9">
            <card class="card bg-white shadow w-100">
                <div class="card-header d-flex flex-row flex-nowrap justify-content-between"> 
                    <h3 class="p-0 m-0 fs-5 text-danger"><i class="fa-solid fa-fire"></i> Get Jobs</h1> <span>Total: <?php echo $totalLinhas; ?></span>
                </div>
                <div class="card-body overflow-auto" style="height:375px !important;">
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Observação</th>
                                <th scope="col">Prioridade</th>
                                <th scope="col">Início</th>
                                <th scope="col">Prazo</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $listRq = new showUsers;
                                foreach($listRq->reqOpenList() as $listRequest){
                                $sendUserId =  $_SESSION['user_id'];
                            ?>
                            <tr>
                                <form action="Controller/Redirect.php" method="post">
                                    <input type="hidden" name="getJobsForm" value="getJobsActive">
                                    <input type="hidden" name="getRequest" value="<?php echo $listRequest['REQ_ID']; ?>">
                                    <input type="hidden" name="getUserId" value="<?php echo $sendUserId; ?>">
                                    <th scope="row"><?php echo $listRequest['REQ_ID']; ?></th>
                                    <td><?php echo $listRequest['COMP_FANTASY_NAME']; ?></td>
                                    <td><?php echo $listRequest['REQ_TYPE']; ?></td>
                                    <td><?php echo $listRequest['REQ_MESSAGE']; ?></td>
                                    <td><?php if($listRequest['REQ_URGENCY'] == 0){ echo "<span class='badge rounded-pill text-bg-primary'>Normal</span>";}else{ echo "<span class='badge rounded-pill text-bg-warning'>Urgente</span>";} ?></td>
                                    <td><?php echo $listRequest['REQ_START_DATE'];?></td>
                                    <td><?php echo $listRequest['REQ_END_DATE']; ?></td>
                                    <td class="d-flex flex-row flex-nowrap h-100"><button type="submit" class="btn border-0 text-success fs-3"><i class="fa-solid fa-circle-right"></i></button></td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </card>
        </div>

        <div class="col-md-3 p-0 d-md-block d-lg-block d-none">
            <div class="w-75 mx-auto">
                <h3>Selecione o <strong>Job</strong> que mais se adequa a você</h3>
                <img class="w-75 h-auto" src="Assets/Img/illustrations/undraw_ideas_flow_re_bmea.svg" alt="">
            </div>
        </div>

        <div class="col-md-9 my-4">
            <card class="card bg-white shadow">
                <div class="card-header">
                    <h3 class="p-0 m-0 fs-5"><i class="fa-sharp fa-solid fa-bullhorn"></i> My Jobs</h1>
                </div>
                <div class="card-body overflow-auto" style="height:375px !important;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Observação</th>
                                <th scope="col">Prioridade</th>
                                <th scope="col">Início</th>
                                <th scope="col">Prazo</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $myListRq = new showUsers;
                                foreach($myListRq->reqOpenMyList() as $myListRequest){
                                $sendUserId =  $_SESSION['user_id'];
                                $sendReqID = $myListRequest['REQ_ID'];
                                $sendMoney = $myListRequest['REQ_VALUE_REPASS'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $myListRequest['REQ_ID']; ?></th>
                                <td><?php echo $myListRequest['COMP_FANTASY_NAME']; ?></td>
                                <td><?php echo $myListRequest['REQ_TYPE']; ?></td>
                                <td><?php echo $myListRequest['REQ_MESSAGE']; ?></td>

                                <td><?php if($myListRequest['REQ_URGENCY'] == 1){ echo "<span class='badge rounded-pill text-bg-primary'>Normal</span>";}else{ echo "<span class='badge rounded-pill text-bg-danger'>Urgente</span>";} ?></td>

                                <td><?php echo $myListRequest['REQ_START_DATE']; ?></td>
                                <td><?php echo $myListRequest['REQ_END_DATE']; ?></td>
                                <td><?php echo "R$ " . number_format($myListRequest['REQ_VALUE_REPASS'], 2, ',', '.'); ?></td>
                                <td class="d-flex flex-row flex-nowrap">
                                <?php echo "<a href='./Controller/Redirect.php?successJobsForm=successJobsActive&returnRequest={$sendReqID}&returnUserId={$sendUserId}&money={$sendMoney}' class='btn text-success fs-3'><i class='fa-solid fa-circle-check'></i></a>"; ?>
                                <span style="margin-right: 10px;"></span>
                                <?php echo "<a href='./Controller/Redirect.php?returnJobsForm=returnJobsActive&returnRequest={$sendReqID}&returnUserId={$sendUserId}' class='btn text-danger fs-3'><i class='fa-solid fa-trash'></i></a></td>"; ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </card>
        </div>

        <div class="col-md-3 my-4 d-md-block d-lg-block d-none">
            <div class="w-75 mx-auto">
                <h3>Aqui estão os seus <strong>Jobs</strong> Atuais</h3>
                <img class="w-100 h-auto" src="Assets/Img/illustrations/undraw_designer_girl_re_h54c222.svg" alt="">
            </div>
        </div>

    </div>

</div>