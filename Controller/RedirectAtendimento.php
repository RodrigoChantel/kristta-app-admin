<?php
require_once('Atender.php');
//require_once('/xampp/htdocs/kallasa.com.br/App/Controller/MeusAtendimentos.php');
if($_POST['atender'] == "atendimento2022"){
    $idUser = $_POST['idDoUser'];
    $idCliente = $_POST['idDoCliente'];

    $enviarDados = new Atendimento;
    $enviarDados->setIdUser2($idUser);
    $enviarDados->setIdClient($idCliente);
    $enviarDados->Atender();
    
}