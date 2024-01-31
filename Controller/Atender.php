<?php
    require_once('./Config/conection.php');
    
    

    class Atendimento{
        public $idUser;
        public $idClient;
        public $dateSend;

        public function __construct()
        {
            $this->getIdUser($this->setIdUser());
            $this->getIdClient();
        }


        public function Atender()
        {   
            $conecta = new connect;
            $conecta = $conecta->connection();
            $idu = $this->idUser;
            $idc = $this->idClient;
            $hoje = date('d/m/Y');

            $idUserActive = mysqli_real_escape_string($conecta, $idu);
            $idClientActive = mysqli_real_escape_string($conecta, $idc);
            $queryVerify = "select ID_USER_RETURN from contact_request where 1";

            $query = "UPDATE contact_request SET ID_USER_RETURN = '{$idUserActive}', RETURNED_IN = '{$hoje}', STATUS = '1' WHERE CLIENT_ID = '{$idClientActive}'";

            $verifyQuery = mysqli_query($conecta, $queryVerify);
            
            $numquery = mysqli_num_rows($verifyQuery);
            $booValidate = filter_var($numquery, FILTER_VALIDATE_BOOL);
            

            if($booValidate == true){
                echo "<script type='text/javascript'>alert('O cliente já está sendo atendido por outra pessoa.');location='index.php';</script>";
            }else{
                $execute = mysqli_query($conecta, $query);

                if($execute == true){
                    echo "<script type='text/javascript'>alert('Atendimento iniciado com sucesso! Acesse a aba de (MEUS ATENDIMENTOS) para ter acesso aos dados');location='index.php';</script>";
                }else{
                    echo "<script type='text/javascript'>alert('ERRO_410 Algo deu errado ao tentar iniciar atendimento, contate o administrador.');location='index.php';</script>";
                }
            }

        }



        public function setIdUser()
        {
            $conecta = new connect;
            $conecta = $conecta->connection();
            $sqlQuery = "select STAFF_ID from users";
            $execute = $conecta->query($sqlQuery);
            $testes = $execute->fetch_all(MYSQLI_ASSOC);
            $this->idUser = $testes;
            foreach ($this->getIdUser() as $key) {
                echo $key['STAFF_ID'];
                
            }
            
            
        }
        public function getIdUser()
        {
            return $this->idUser;
        }

        public function setIdUser2($testes2)
        {
            $this->idUser = $testes2;         
            
        }
        public function getIdUser2()
        {
            return $this->idUser;
        }

        public function setIdClient($setIdClient)
        {
            $this->idClient = $setIdClient;
        }
        public function getIdClient()
        {
            return $this->idClient;
        }
    }

    
    
    