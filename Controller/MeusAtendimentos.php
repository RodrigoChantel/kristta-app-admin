<?php
    include_once('../Config/conection.php');
    class Jobs{
        public $reqID;
        public $userID;
        public $money;

        public function GetJobs()
        {
            $conexao = new connect;
            $conexao = $conexao->connection();

            $saveReqId = $this->getReqID();
            $saveUserId = $this->getUserID();

            $sqlQuery = "UPDATE `requests` 
                        SET `REQ_USER`='{$saveUserId}' 
                        WHERE REQ_ID = '{$saveReqId}'";

            $newGetJob = mysqli_query($conexao, $sqlQuery);
                        
            if($newGetJob == true){
                header('Location: ../return.php?postReturn=getjobsOk');
                exit();
            }
            
        }

        public function ReturnJob()
        {
            $conexao = new connect;
            $conexao = $conexao->connection();

            $saveReqId = $this->getReqID();
            $saveUserId = $this->getUserID();

            $sqlQuery = "UPDATE `requests` 
                        SET `REQ_USER`= '0' 
                        WHERE REQ_ID = '{$saveReqId}'";

            $newGetJob = mysqli_query($conexao, $sqlQuery);
                        
            if($newGetJob == true){
                header('Location: ../return.php?postReturn=getjobsReturn');
                exit();
            }
        }
        
        public function repassValues()
        {
            $conexao = new connect;
            $conexao = $conexao->connection();

            $saveReqId = $this->getReqID();
            $saveUserId = $this->getUserID();
            $saveMoney = $this->getMoney();
            $date = date("m/Y");

            $sqlQuery = "UPDATE `requests` 
                        SET `REQ_STATUS` = 4, `REQ_INVOICING` = '{$date}'
                        WHERE `REQ_ID` = '{$saveReqId}'";

            $newGetJob = mysqli_query($conexao, $sqlQuery);
                        
            if($newGetJob == true){


                $repass = "UPDATE `users` SET `STAFF_MONEY` = `STAFF_MONEY` + $saveMoney 
                            WHERE STAFF_ID = '{$saveUserId}'";

                $repassMoney = mysqli_query($conexao, $repass);

                if($repassMoney == true){
                    header('Location: ../return.php?postReturn=getjobsFinish');
                exit();
                }
            }
        }

        public function getReqID()
        {
            return $this->reqID;
        }
        public function getUserID()
        {
            return $this->userID;
        }
        public function getMoney()
        {
            return $this->money;
        }


        public function setReqID($newReq)
        {
            $this->reqID = $newReq;
        }
        public function setUserID($newUser)
        {
            $this->userID = $newUser;
        }
        public function setMoney($mon)
        {
            $this->money = $mon;
        }

    }

    