<?php

@include_once('../Config/conection.php');
@include_once('../Config/auth.php');

class Usuario {
    private $userName;
    private $userPassword;
    private $nameUser;
    private $lastNameUser;
    private $cpfUser;
    private $rgUser;
    private $birth;
    private $emailUser;
    private $pixKey;
    private $functionUserSend;

    //Registrar novo usuário
    public function CreateNewUser() {
        $conexao = new connect;
        $conexao = $conexao->connection();
    
        // Verifica se há campos vazios
        if (
            empty($this->getUserName()) ||
            empty($this->getUserPassword()) ||
            empty($this->getNameUser()) ||
            empty($this->getLastNameUser()) ||
            empty($this->getCpfUser()) ||
            empty($this->getRgUser()) ||
            empty($this->getBirth()) ||
            empty($this->getFunctionUserSend()) ||
            empty($this->getEmailUser()) ||
            empty($this->getPixKey())
        ) {
            header('Location: ../return.php?postReturn=emptyUsers');
            exit(); // Encerra a execução após redirecionamento
        }
    
        // Prepara a consulta SQL
        $queryInsert = "INSERT INTO `users`(`STAFF_USER`, `STAFF_PASSWORD`, `STAFF_FIRST_NAME`, `STAFF_LAST_NAME`, `STAFF_CPF`, `STAFF_RG`, `STAFF_BIRTH`, `STAFF_IDCARGO`, `STAFF_EMAIL`, `STAFF_USER_AUTH`, `STAFF_PIX_KEY`) VALUES ('{$this->getUserName()}','{$this->getUserPassword()}','{$this->getNameUser()}','{$this->getLastNameUser()}','{$this->getCpfUser()}','{$this->getRgUser()}','{$this->getBirth()}','{$this->getFunctionUserSend()}','{$this->getEmailUser()}','3','{$this->getPixKey()}')";
    
        // Executa a consulta
        $execute = mysqli_query($conexao, $queryInsert);
    
        // Verifica o resultado da execução
        if ($execute) {
            header('Location: ../return.php?postReturn=insertUserSuccess');
        } else {
            header('Location: ../return.php?postReturn=00');
        }
        exit(); // Encerra a execução após redirecionamento
    }
    

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = strtolower($userName);
    }

    public function getUserPassword() {
        return $this->userPassword;
    }

    public function setUserPassword($userPassword) {
        $hashConverter = password_hash($userPassword, PASSWORD_DEFAULT);
        $this->userPassword = $hashConverter;
    }

    public function getNameUser() {
        return $this->nameUser;
    }

    public function setNameUser($nameUser) {
        $this->nameUser = strtolower($nameUser);
    }

    public function getLastNameUser() {
        return $this->lastNameUser;
    }

    public function setLastNameUser($lastNameUser) {
        $this->lastNameUser = strtolower($lastNameUser);
    }

    public function getCpfUser() {
        return $this->cpfUser;
    }

    public function setCpfUser($cpfUser) {
        $this->cpfUser = preg_replace('/[^0-9]/', '', $cpfUser);
    }

    public function getRgUser() {
        return $this->rgUser;
    }

    public function setRgUser($rgUser) {
        $this->rgUser = preg_replace('/[^0-9]/', '', $rgUser);
    }

    public function getBirth() {
        return $this->birth;
    }

    public function setBirth($birth) {
        $this->birth = $birth;
    }

    public function getEmailUser() {
        return $this->emailUser;
    }

    public function setEmailUser($emailUser) {
        $this->emailUser = strtolower($emailUser);
    }

    public function getPixKey() {
        return $this->pixKey;
    }

    public function setPixKey($pixKey) {
        $this->pixKey = $pixKey;
    }

    public function getFunctionUserSend() {
        return $this->functionUserSend;
    }

    public function setFunctionUserSend($functionUserSend) {
        $this->functionUserSend = $functionUserSend;
    }
}
