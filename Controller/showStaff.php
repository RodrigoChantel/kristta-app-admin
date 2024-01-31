<?php

    include_once('./Config/conection.php');
    include_once('./Config/auth.php');
    
    class showUsers{

        public function staff(){
            $conexao = new connect;
            $conexao = $conexao->connection();
            

            $sqlQuery = "SELECT *
                        FROM users
                        WHERE STAFF_ID = '{$_SESSION['user_id']}'";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function krtList(){
            $conexao = new connect;
            $conexao = $conexao->connection();
            

            $sqlQuery = "SELECT *
                        FROM krt_finance
                        WHERE STAFF_ID = '{$_SESSION['user_id']}'";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function krtGanhosMes(){
            $conexao = new connect;
            $conexao = $conexao->connection();
            
            // Obter a data atual no formato YYYY-MM-DD
            $faturamento = date('Y-m-d');

            // Extrair o ano e o mês da data atual
            $ano = date('Y');
            $mes = date('m');

            // Obter o primeiro dia do mês atual
            $primeiroDia = "{$ano}-{$mes}-01";

            // Obter o último dia do mês atual
            $ultimoDia = date('Y-m-t', strtotime($faturamento));

            // Montar a consulta SQL para calcular o faturamento no mês atual
            $sqlQuery = "SELECT SUM(INV_VALUE)
                        FROM invoice
                        WHERE INV_PAYMENT_DATE BETWEEN '{$primeiroDia}' AND '{$ultimoDia}'";


            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function krtGastosMes(){
            $conexao = new connect;
            $conexao = $conexao->connection();
            
            // Obter a data atual no formato YYYY-MM-DD
            $faturamento = date('Y-m-d');

            // Extrair o ano e o mês da data atual
            $ano = date('Y');
            $mes = date('m');

            // Obter o primeiro dia do mês atual
            $primeiroDia = "{$ano}-{$mes}-01";

            // Obter o último dia do mês atual
            $ultimoDia = date('Y-m-t', strtotime($faturamento));

            // Montar a consulta SQL para calcular o faturamento no mês atual
            $sqlQuery = "SELECT SUM(KRT_BACK)
                        FROM krt_finance
                        WHERE KRT_REG_DATE BETWEEN '{$primeiroDia}' AND '{$ultimoDia}'";


            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function krtGanhosAno(){
            $conexao = new connect;
            $conexao = $conexao->connection();
            
            $faturamento = date('Y');

            $sqlQuery = "SELECT SUM(INV_VALUE)
                        FROM invoice
                        WHERE INV_STATUS = '1' AND INV_PAYMENT_DATE LIKE '%2023%' ";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        //Quantidade de solicitações Atendidas
        public function reqSuccess(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $sqlQuery = "SELECT COUNT(*)
                        FROM requests
                        WHERE REQ_STATUS = 4";

            $result = mysqli_query($conexao, $sqlQuery);
            $totalLinhas = mysqli_fetch_row($result)[0];

            return $totalLinhas;
        }

        //Quantidade de solicitações Atendidas por Usuário
        public function reqSuccessUser(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $sqlQuery = "SELECT COUNT(*)
                        FROM requests
                        WHERE REQ_STATUS = 4
                        AND REQ_USER = '{$_SESSION['user_id']}'";

            $result = mysqli_query($conexao, $sqlQuery);
            $totalLinhas = mysqli_fetch_row($result)[0];

            return $totalLinhas;
        }

        //Quantidade de solicitações pendentes
        public function reqOpen(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $sqlQuery = "SELECT COUNT(*)
                        FROM requests
                        WHERE REQ_STATUS = 1";

            $result = mysqli_query($conexao, $sqlQuery);
            $totalLinhas = mysqli_fetch_row($result)[0];

            return $totalLinhas;
        }

        //Solicitações em Atraso
        public function reqOpenAway() {
            $conexao = new connect;
            $conexao = $conexao->connection();
        
            $today = date('Y-m-d');
            
            $sqlQuery = "SELECT COUNT(REQ_END_DATE)
                        FROM requests
                        WHERE DATE_FORMAT(STR_TO_DATE(REQ_END_DATE, '%d/%m/%Y'), '%Y-%m-%d') < '{$today}'
                        AND REQ_STATUS = 1";
        
            $result = mysqli_query($conexao, $sqlQuery);
            $totalLinhas = mysqli_fetch_row($result)[0];
        
            return $totalLinhas;
        }

        //Lista todas as solicitações pendentes
        public function reqOpenList(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $sqlQuery = "SELECT requests.*,companies.*
                        FROM requests
                        INNER JOIN companies ON requests.REQ_COMPANY = companies.COMP_ID
                        WHERE REQ_STATUS = 1
                        AND REQ_USER = 0";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        // Solicitações por usuário
        public function reqOpenMyList(){
            $conexao = new connect;
            $conexao = $conexao->connection();

            $sqlQuery = "SELECT requests.*,companies.*
                        FROM requests
                        INNER JOIN companies ON requests.REQ_COMPANY = companies.COMP_ID
                        WHERE REQ_USER = '{$_SESSION['user_id']}'
                        AND REQ_STATUS = 1";

            $check = mysqli_query($conexao, $sqlQuery);
            $checkAssoc = $check->fetch_all(MYSQLI_ASSOC); 
            return $checkAssoc;
        }

        public function krtGanhosMesAno() {
            $conexao = new connect;
            $conexao = $conexao->connection();
        

            $ano = date('Y');
        
            $faturamento = [
                "01/{$ano}",  
                "02/{$ano}",  
                "03/{$ano}",  
                "04/{$ano}",  
                "05/{$ano}",  
                "06/{$ano}",  
                "07/{$ano}",  
                "08/{$ano}",  
                "09/{$ano}",  
                "10/{$ano}",  
                "11/{$ano}", 
                "12/{$ano}"  
            ];
        
            $resultados = array();
        
            foreach ($faturamento as $mes) {

                list($mesNumero, $anoAtual) = explode('/', $mes);
        
                // Primeiro e ultimo dia do mês
                $primeiroDia = "{$anoAtual}-{$mesNumero}-01";
                $ultimoDia = date('Y-m-t', strtotime($primeiroDia));
        
                //
                $sqlQuery = "SELECT SUM(INV_VALUE) 
                            FROM invoice 
                            WHERE INV_PAYMENT_DATE BETWEEN '{$primeiroDia}' AND '{$ultimoDia}'";
        
                $check = mysqli_query($conexao, $sqlQuery);
                $checkAssoc = $check->fetch_all(MYSQLI_ASSOC);
                $valor = $checkAssoc[0]['SUM(INV_VALUE)'];
                $resultados[$mes] = $valor;
            }
        
            return $resultados;
        }


        public function krtGastosMesAno() {
            $conexao = new connect;
            $conexao = $conexao->connection();
        

            $ano = date('Y');
        
            $faturamento = [
                "01/{$ano}",  
                "02/{$ano}",  
                "03/{$ano}",  
                "04/{$ano}",  
                "05/{$ano}",  
                "06/{$ano}",  
                "07/{$ano}",  
                "08/{$ano}",  
                "09/{$ano}",  
                "10/{$ano}",  
                "11/{$ano}", 
                "12/{$ano}"  
            ];
        
            $resultados = array();
        
            foreach ($faturamento as $mes) {

                list($mesNumero, $anoAtual) = explode('/', $mes);
        
                // Primeiro e ultimo dia do mês
                $primeiroDia = "{$anoAtual}-{$mesNumero}-01";
                $ultimoDia = date('Y-m-t', strtotime($primeiroDia));
        
                //
                $sqlQuery = "SELECT SUM(KRT_BACK) 
                            FROM krt_finance 
                            WHERE KRT_REG_DATE BETWEEN '{$primeiroDia}' AND '{$ultimoDia}'";
        
                $check = mysqli_query($conexao, $sqlQuery);
                $checkAssoc = $check->fetch_all(MYSQLI_ASSOC);
                $valor = $checkAssoc[0]['SUM(KRT_BACK)'];
                $resultados[$mes] = $valor;
            }
        
            return $resultados;
        }
        

    }