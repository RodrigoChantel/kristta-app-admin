<?php
//include_once('/xampp/htdocs/kallasa.com.br/App/Controller/Login.php');
session_start();
if(!$_SESSION['user']) {
	header('Location: Views/pages/login/index.php');
	exit();
}
?>