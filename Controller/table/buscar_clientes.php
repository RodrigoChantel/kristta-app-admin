<?php
    //include_once('../../Config/conection.php');
// Função para buscar a lista de clientes do banco de dados
function buscarClientes() {
    $conexao = new connect;
    $conexao = $conexao->connection();

    // Consulta para buscar a lista de clientes
    $sql = "SELECT * FROM companies";
    $result = mysqli_query($conexao, $sql);


    $clientes = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
    }

    return $clientes;
}


?>
