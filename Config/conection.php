<?php

class connect{
    public function connection(){
        $hostWeb = "127.0.0.1";
        $userWeb = "user";
        $passwordWeb = "";
        $dbWeb = "";

        @$connectWeb = mysqli_connect ($hostWeb, $userWeb, $passwordWeb, $dbWeb);

        if($connectWeb == 0){

            $host = "127.0.0.1";
            $user = "root";
            $password = "";
            $db = "kristta_old";

            $connect = mysqli_connect ($host, $user, $password, $db) or die ('Falha na conexão com o Banco de Dados. <br> Contate o Administrador.');

            return $connect;
            
        }else{
            return $connectWeb;
        }
    }
}

