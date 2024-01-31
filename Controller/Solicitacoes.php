<?php
    require_once('./Config/conection.php');
    
    if($_SESSION == true){
        class Solicitacoes{
            public $dados;
            public $contagem;
            public $dadosUser;

            public function __construct()
            {
                $this->getDados($this->setDados());
                $this->getDadosUser($this->setDadosUser());
                $this->setCount();
            }

            public function setDados()
            {
                $conexao = new connect;
                $conexao = $conexao->connection();
                $sqlQuery = "select * from contact_request where ID_USER_RETURN IS NULL";
                $execute = $conexao->query($sqlQuery);
                //$list = mysqli_num_rows($execute);
                $this->dados = $execute->fetch_all(MYSQLI_ASSOC); 
            }
            public function getDados()
            {
                return $this->dados;
            }
            

            public function setDadosUser()
            {
                $conexao = new connect;
                $conexao = $conexao->connection();
                $userID = $_SESSION['user_id'];
                $sqlQuery = "select * from contact_request where ID_USER_RETURN = '{$userID}' ";
                $execute = $conexao->query($sqlQuery);
                //$list = mysqli_num_rows($execute);
                $this->dadosUser = $execute->fetch_all(MYSQLI_ASSOC); 
            }
            public function getDadosUser()
            {
                return $this->dadosUser;
            }


            public function setCount()
            {
                $conexao = new connect;
                $conexao = $conexao->connection();
                $sqlQuery = "select CLIENT_ID from contact_request where 1";
                $execute = mysqli_query($conexao, $sqlQuery);
                //$execute = $conexao->query($sqlQuery);
                $testao = mysqli_num_rows($execute);
                
                $this->contagem = $testao;
            }
            public function getCount()
            {
                echo $this->contagem;
            }

        }
    }else{
        echo "Algo deu errado, contate o administrador.";
    }