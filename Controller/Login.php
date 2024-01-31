<?php
    include_once('../Config/conection.php');
    class Login{
        private $userName;
        private $passwordUser;
        public $lastLogin;
        private $ip;

        // Metodos
        public function validarLogin()
        {
            
            if($this->getName() == !null and $this->getPassword() == !null){
                $conexao = new connect;
                $conexao = $conexao->connection();

                $str1 = $this->getName();
                $str2 = $this->getPassword();
                $str3 = $this->getLastLogin();
                $str4 = $this->getIp();
                $user = mysqli_real_escape_string($conexao, strtolower (str_replace('=', '', $str1)));
                $password = mysqli_real_escape_string($conexao, $str2);
                $lastLogin = mysqli_real_escape_string($conexao, strtolower (str_replace('=', '', $str3)));
                $ipAuth = mysqli_real_escape_string($conexao, strtolower( str_replace('=', '', $str4)));
                
                $queryDB = "SELECT * FROM `users` WHERE STAFF_USER = '{$user}'";
                $checkLogin = mysqli_query($conexao, $queryDB);
                //$checkPasswordV =  mysqli_fetch_assoc($checkPassword);
                $numquery = mysqli_num_rows($checkLogin);

                if ($numquery == true) {
                    $passwordString = mysqli_real_escape_string($conexao, $password);
                    $passwordEncrypt = password_hash($passwordString, PASSWORD_DEFAULT);
                
                    // Busca a senha hash cadastrada, comparando com o nome de usuário.
                    $queryPassword = "SELECT * FROM users WHERE STAFF_USER = '{$user}'";
                    $executeQueryPassword = mysqli_query($conexao, $queryPassword);
                    $listQuery = mysqli_fetch_assoc($executeQueryPassword);
                    $result = $listQuery['STAFF_PASSWORD'];
                
                    // Compara a senha fornecida via POST com a senha resgatada do banco de dados
                    if (password_verify($passwordString, $result)) {
                        session_start();
                        $_SESSION['user'] = $listQuery['STAFF_USER'];
                        $_SESSION['user_name'] = $listQuery['STAFF_FIRST_NAME'];
                        $_SESSION['user_auth'] = $listQuery['STAFF_USER_AUTH'];
                        $_SESSION['user_cargo'] = $listQuery['STAFF_IDCARGO'];
                        $_SESSION['user_id'] = $listQuery['STAFF_ID'];
                        header("location: ../index.php");
                        exit();
                    } else {
                        header('Location: ../Views/pages/login/');
                        exit();
                    }
                } else {
                    echo "<script>window.alert('Usuário ou senha incorretos! Contate o administrador.'); location='../Views/pages/login/';</script>";
                    exit();
                }
                
                
            }else{
                header('location:../Views/pages/login/');
            }
        }


        // Especiais
        public function setName($user)
        {
            $this->userName = $user;
        }
        public function getName()
        {
            return $this->userName;
        }

        public function setPassword($pwd)
        {
            $this->passwordUser = $pwd;
        }
        public function getPassword()
        {
            return $this->passwordUser;
        }

        public function setLastLogin()
        {
            $this->lastLogin = date('d/m/Y');
        }
        public function getLastLogin()
        {
            return $this->lastLogin;
        }

        public function setIp($sip)
        {
            $this->ip = $sip;
        }
        public function getIp()
        {
            return $this->ip;
        }

    }