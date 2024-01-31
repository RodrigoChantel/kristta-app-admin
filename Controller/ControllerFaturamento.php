<?php
    //O @ Serve para ocultar alertas do PHP
    @include_once('../Config/conection.php');
    @include_once('../Config/auth.php');

    class Faturamento{
        public $mesFaturamento;
        private $vencimento;
        private $company;
        private $payInvoice;
        private $invoicingData;

            
        public function clientList(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $clienteId = $_POST['clienteId'];
            

            $sqlQuery = "SELECT *
                        FROM companies
                        WHERE 1";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function listJobsPerUser(){
            $conexao = new connect;
            $conexao = $conexao->connection();
            

            $sqlQuery = "SELECT *
                        FROM requests
                        WHERE 1";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        // Essa função é reponsável por gerar faturas dentro do painel
        public function gerarFatura(){

            $conexao = new connect;
            $conexao = $conexao->connection();

            // SOMA TODOS OS VALORES VINCULADOS A SOLICITAÇÕES QUE FORAM ANTEDIDAS DENTRO DO MÊS A SER FATURADO
            $queryRequest = "  SELECT SUM(REQ_VALUE) 
                            FROM requests 
                            WHERE REQ_COMPANY = '{$this->getCompany()}' 
                            AND REQ_INVOICING = '{$this->getMesFat()}' ";
            $executeQueryRequest = mysqli_query($conexao, $queryRequest); //EXECUTA A SOMA DOS VALORES DAS SOLICITAÇÕES ATENDIDAS
            $totalRequest = mysqli_fetch_row($executeQueryRequest); //Enumera o valor total

            // SOMA OS VALORES DE TODOS OS PLANOS ATIVOS VINCULADSO AO CLIENTE_ID
            $queryPlans = "  SELECT SUM(CP_VALUE) 
                            FROM companies_plans
                            WHERE CP_CLIENT_ID = '{$this->getCompany()}' 
                        ";
            $executeQueryPlans = mysqli_query($conexao, $queryPlans); // Executa a soma dos valores dos planos ativos e vinculados ao Client_ID
            $totalPlans = mysqli_fetch_row($executeQueryPlans); //Enumera o valor total dos planos

            $requestTo = $totalRequest[0];
            $plansTo = $totalPlans[0];

            $totalSomado = $requestTo + $plansTo;

            if ($totalSomado) {
                $valorTotal = $totalSomado;

                $sqlUpdate = "  UPDATE `requests` 
                                SET `REQ_PAYMENT_STATUS`='1' 
                                WHERE REQ_COMPANY = '{$this->getCompany()}' 
                                AND REQ_INVOICING = '{$this->getMesFat()}' ";
                
                $execute2 = mysqli_query($conexao, $sqlUpdate);

                $sqlDebito = "  INSERT INTO `invoice`(`INV_COMPANY`, `INV_VALIDATE`, `INV_STATUS`, `INV_VALUE`, `INV_DIRECTORY`, `INV_INVOICING`)
                                VALUES ('{$this->getCompany()}','{$this->getVencimento()}','0','{$valorTotal}','invoices/','{$this->getMesFat()}')";
                $criarFatura = mysqli_query($conexao, $sqlDebito);
                header('Location: ../return.php?postReturn=invoiced');
            } else {
                header('Location: ../return.php?postReturn=faill');
            }
        }

        public function listarFaturas(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $queryList = "  SELECT *
                            FROM invoice
                            WHERE 1
                            ORDER BY INV_REGDATE DESC";

            $execute = mysqli_query($conexao, $queryList);
            $list = mysqli_fetch_all($execute,MYSQLI_ASSOC);
            return $list;
        }

        public function joinFaturasEmpresas()
        {
            $conexao = new connect;
            $conexao = $conexao->connection();

            $queryCompany = "SELECT * 
                            FROM invoice
                            INNER JOIN companies
                            ON invoice.INV_COMPANY = companies.COMP_ID
                            ORDER BY INV_REGDATE DESC";

            $execute = mysqli_query($conexao, $queryCompany);
            $listInvoices = mysqli_fetch_all($execute,MYSQLI_ASSOC);

            return $listInvoices;
        }

        public function invoicePayment()
        {
            include_once('../Config/conection.php');
            $conexao = new connect;
            $conexao = $conexao->connection();

            $now = date('Y-m-d');

            $paymentQuery = "UPDATE `invoice` SET `INV_STATUS` = '1', `INV_PAYMENT_DATE` = '{$now}' WHERE `INV_ID` = '{$this->getPayInvoice()}' ";

            $execute = mysqli_query($conexao, $paymentQuery);

            if($execute == true){
                header('Location: ../return.php?postReturn=paymentSuccess');
            }else{
                header('Location: ../return.php?postReturn=00');
            }

        }

        public function invoiceCancelPayment()
        {
            include_once('../Config/conection.php');
            $conexao = new connect;
            $conexao = $conexao->connection();

            //Deleta fatura
            $executeCancelInvoice = "DELETE FROM `invoice` WHERE `INV_ID` = '{$this->getPayInvoice()}' ";
            //Retorna status para que possa ser faturado novamente.
            $executeRequestReturn = "UPDATE `requests` 
                                    SET `REQ_PAYMENT_STATUS`='0', `REQ_STATUS`='0', `REQ_INVOICING`='{$this->getInvoicing()}'
                                    WHERE REQ_COMPANY = '{$this->getCompany()}' 
                                    AND REQ_INVOICING = '{$this->getInvoicing()}';";

            $executeCode = mysqli_query($conexao, $executeCancelInvoice);
            $executeNewCode =mysqli_query($conexao, $executeRequestReturn);

            if($executeCode == true || $executeNewCode == true){
                header('Location: ../return.php?postReturn=paymentCancel');
            }else{
                header('Location: ../return.php?postReturn=00');
            }
        }

        public function invoiceReversalPayment()
        {
            include_once('../Config/conection.php');
            $conexao = new connect;
            $conexao = $conexao->connection();

            $now = date('Y-m-d');

            $paymentQuery = "UPDATE `invoice` SET `INV_STATUS` = '0', `INV_PAYMENT_DATE` = '' WHERE `INV_ID` = '{$this->getPayInvoice()}' ";

            $execute = mysqli_query($conexao, $paymentQuery);

            if($execute == true){
                header('Location: ../return.php?postReturn=paymentReversal');
            }else{
                header('Location: ../return.php?postReturn=00');
            }
        }

        public function getMesFat()
        {
            return $this->mesFaturamento;
        }
        public function getVencimento()
        {
            return $this->vencimento;
        }
        public function getCompany()
        {
            return $this->company;
        }

        public function getPayInvoice()
        {
            return $this->payInvoice;
        }

        public function getInvoicing()
        {
            return $this->invoicingData;
        }

        public function setMesFat($recFat)
        {
            $recFat = date("m/Y", strtotime($recFat));
            $this->mesFaturamento = $recFat;
        }
        public function setVencimento($recVen)
        {
            $dataFormatada = date('d-m-Y', strtotime($recVen));
            $this->vencimento = $dataFormatada;

        }
        public function setCompany($reccomp)
        {
            $this->company = $reccomp;
        }

        public function setPayInvoice($recPayment)
        {
            $this->payInvoice = $recPayment;
        }

        public function setInvoicing($recInvoicing)
        {
            $this->invoicingData = $recInvoicing;
        }

    }