
<style>
    .tesc {
        border-radius: 5px;
        border-left: 15px solid;
    }
</style>

<div class="container-fluid overflow-auto d-block" style="max-height: 100%;">
    <div class="row pt-3">
        <div class="col-md-12 d-flex flex-row flex-nowrap justify-content-between">
            <h6>INÍCIO</h6>
            <span>Bem-vindo, <?php echo ucwords($_SESSION['user']); ?>!</span>
        </div>
        <hr>
    </div>
    <div class="row px-3 justify-content-between">
        
        <div class="card border-primary tesc my-2" style="max-width: 18rem;">
            <div class="card-header">GANHOS (ESSE MÊS)</div>
            <div class="bg-white border-primary text-primary d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                <?php
                    $listKrt = new showUsers;
                    foreach($listKrt->krtGanhosMes() as $listKrtGanhosMes){
                    $ganhos = $listKrtGanhosMes['SUM(INV_VALUE)'];
                ?>
                <p class="card-title fs-3"><?php echo $ganhosFormatados = number_format($ganhos, 2, ',', '.'); ?></p>
                <?php } ?>
                <p class="p-0 m-0"><i class="fas fa-calendar-days fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

        <div class="card border-success tesc my-2" style="max-width: 18rem;">
            <div class="card-header">GANHOS (ESSE ANO)</div>
            <div class="bg-white border-success text-success d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                <?php
                    $listKrt = new showUsers;
                    foreach($listKrt->krtGanhosAno() as $listKrtGanhosAno){
                    $ganhosAno = $listKrtGanhosAno['SUM(INV_VALUE)'];
                ?>
                <p class="card-title fs-3"><?php echo $ganhosFormatados = number_format($ganhosAno, 2, ',', '.'); ?></p>
                <?php } ?>
                <p class="p-0 m-0"><i class="fas fa-brazilian-real-sign fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

        <div class="card border-danger tesc my-2" style="max-width: 18rem;">
            <div class="card-header">GASTOS (ESTE MÊS)</div>
            <div class="bg-white border-info text-danger d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
            <?php
                    $listKrt = new showUsers;
                    foreach($listKrt->krtGastosMes() as $listKrtGanhosAno){
                    $ganhosAno = $listKrtGanhosAno['SUM(KRT_BACK)'];
                ?>
                <p class="card-title fs-3"><?php echo $ganhosFormatados = number_format($ganhosAno, 2, ',', '.'); ?></p>
                <?php } ?>
                <p class="p-0 m-0"><i class="fas fa-calendar-days fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

        <div class="card border-warning tesc my-2" style="max-width: 18rem;">
            <div class="card-header">REQUISIÇÕES PENDENTES</div>
            <div class="bg-white border-warning text-warning d-flex flex-row flex-wrap justify-content-around align-items-center m-0 py-3">
                
                <?php
                    $totalLinhas = new showUsers;
                    $totalLinhas = $totalLinhas->reqOpen();
                ?>
                <p class="card-title fs-3"><?php echo $totalLinhas; ?></p>
                <p class="p-0 m-0"><i class="fas fa-clipboard-check fs-1 text-secondary opacity-25 p-0 m-0"></i></p>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-md-9">
            <div class="card mb-3" style="max-width: 100%;">
                <?php include_once('Views/pages/others/chart.php'); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <img style="width:300px;" src="Assets/Img/illustrations/undraw_in_the_office_re_jtgc.svg" alt="">
                    </div>
                    <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">Getão de Negócio</h5>
                        <p class="card-text">Comunicação e gestão do tempo são essenciais para o sucesso dos negócios. Uma comunicação clara e eficiente aliada a uma boa gestão do tempo impulsionam resultados positivos</p>
                        <p class="card-text"><small class="text-muted">Rodrigo Chantel Hora</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
        
    </div>

</div>
