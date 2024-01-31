<?php
    
    if(@$_POST['loginDashboard'] == 'auth2022'){
        include_once('Login.php');
        $user = $_POST['usuario'];
        $password =  $_POST['senha'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $sendLogin = new Login;
        $sendLogin->setName($user);
        $sendLogin->setPassword($password);
        $sendLogin->setIp($ip);
        $sendLogin->validarLogin();
    }

    if(@$_POST['getJobsForm'] == 'getJobsActive'){
        include_once('MeusAtendimentos.php');
        $reqID = $_POST['getRequest'];
        $userID = $_POST['getUserId'];

        $sendData = new Jobs;
        $sendData->setReqID($reqID);
        $sendData->setUserID($userID);
        $sendData->GetJobs();
        
    }

    if(@$_GET['returnJobsForm'] == 'returnJobsActive'){
        include_once('MeusAtendimentos.php');
        $reqID2 = $_GET['returnRequest'];
        $userID2 = $_GET['returnUserId'];

        $sendData = new Jobs;
        $sendData->setReqID($reqID2);
        $sendData->setUserID($userID2);
        $sendData->ReturnJob();
        
    }

    if(@$_GET['successJobsForm'] == 'successJobsActive'){
        include_once('MeusAtendimentos.php');
        $reqID2 = $_GET['returnRequest'];
        $userID2 = $_GET['returnUserId'];
        $money = $_GET['money'];

        $sendData = new Jobs;
        $sendData->setReqID($reqID2);
        $sendData->setUserID($userID2);
        $sendData->setMoney($money);
        $sendData->repassValues();
        
    }

    if(@$_POST['faturamento'] == "faturar"){
        include_once('ControllerFaturamento.php');
        $faturamento = $_POST['clienteFaturamento'];
        $vencimento = $_POST['finalDate'];
        $debitos = $_POST['companySelect'];

        $sendNewData = new Faturamento;
        $sendNewData->setMesFat($faturamento);
        $sendNewData->setVencimento($vencimento);
        $sendNewData->setCompany($debitos);
        $sendNewData->gerarFatura();
    }

    //Baixa de pagamento
    if(@$_GET['payInvoice'] == "returnPayInvoice"){
        include_once('ControllerFaturamento.php');
        $paymentInvoice = $_GET['openinvoice'];

        $sendNewDataPayment = new Faturamento;
        $sendNewDataPayment->setPayInvoice($paymentInvoice);
        $sendNewDataPayment->invoicePayment();

    }

    //Cancelamento de Fatura
    if(@$_GET['cancelInvoice'] == "returnCancelInvoice"){
        include_once('ControllerFaturamento.php');
        $paymentCancelInvoice = $_GET['openinvoiceCancel'];
        $invoicing = $_GET['invoicing'];
        $company = $_GET['company'];

        $sendNewDataPaymentCancel = new Faturamento;
        $sendNewDataPaymentCancel->setPayInvoice($paymentCancelInvoice);
        $sendNewDataPaymentCancel->setInvoicing($invoicing);
        $sendNewDataPaymentCancel->setCompany($company);
        $sendNewDataPaymentCancel->invoiceCancelPayment();

    }

    //Estorno de Fatura
    if(@$_GET['ReversalInvoice'] == "returnReversalInvoice"){
        include_once('ControllerFaturamento.php');
        $paymentCancelInvoice = $_GET['openinvoiceReversal'];

        $sendNewDataPaymentCancel = new Faturamento;
        $sendNewDataPaymentCancel->setPayInvoice($paymentCancelInvoice);
        $sendNewDataPaymentCancel->invoiceReversalPayment();

    }

    // Cadastro de novo funcionário
    if (@$_POST['validNewUser'] == 'newUserValid') {
        include_once('ControllerUsers.php');
        $usuario = new Usuario();

        $usuario->setUserName($_POST['userName']);
        $usuario->setUserPassword($_POST['password']);
        $usuario->setNameUser($_POST['nameUser']);
        $usuario->setLastNameUser($_POST['lastNameUser']);
        $usuario->setCpfUser($_POST['Cpf']);
        $usuario->setRgUser($_POST['Rg']);
        $usuario->setBirth($_POST['nascimento']);
        $usuario->setEmailUser($_POST['emailUser']);
        $usuario->setPixKey($_POST['chavePix']);
        $usuario->setFunctionUserSend($_POST['functionUser']);

        // Execução do registro de cadastro.
        $usuario->CreateNewUser();


    }
