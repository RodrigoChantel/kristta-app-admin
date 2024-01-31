<?php
include_once('../../Config/conection.php');
if (isset($_POST['clienteId'])) {
    $clienteId = $_POST['clienteId'];

    // Aqui você pode fazer a consulta no banco de dados para buscar os dados relevantes com base no ID do cliente
    // Por exemplo:
    // $dados = buscaDadosTabelaPorCliente($clienteId);

    function searchRequest() {
        $conexao = new connect;
        $conexao = $conexao->connection();

        $clienteFaturamento = $_POST['clienteFaturamento'];
        $faturamentoFormatado = date('m/Y', strtotime($clienteFaturamento));
    
        // Consulta para buscar a lista de clientes
        $sql = "SELECT * FROM requests WHERE REQ_COMPANY = '{$_POST['clienteId']}' AND REQ_INVOICING = '{$faturamentoFormatado}' AND REQ_PAYMENT_STATUS = '0' ";
        $result = mysqli_query($conexao, $sql);
    
    
        $requests = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $requests[] = $row;
            }
        }
    
        return $requests;
    }

    // Para fins de exemplo, vamos simular que estamos buscando alguns dados aleatórios para preencher a tabela
    //$dados = array(
    //    array('id' => 1, 'descricao' => 'Serviço 1', 'valor' => 100.00)
    //);

    $request = searchRequest();
    // Monta a tabela com os dados retornados
    echo '<table class="table table-hover">';
    echo '<thead><tr><th scope="col">ID</th><th scope="col">Descrição</th><th scope="col">Conclusão</th><th scope="col">Valor</th><th scope="col">Ação</th></tr></thead>';

    foreach ($request as $item) {
        echo '<tbody>';
        echo '<tr>';
        echo "<td scope='row'>" . $item['REQ_ID'] . '</td>';
        echo '<td>' . $item['REQ_MESSAGE'] . '</td>';
        echo '<td>' . $item['REQ_END_DATE'] . '</td>';
        echo "<td style='white-space: nowrap'>R$ " . number_format($item['REQ_VALUE_REPASS'], 2, ',', '.') . '</td>';
        echo "<td class='d-flex flex-row flex-nowrap'><button type='submit' class='btn btn-primary border-0'>TRANSFERIR</button></td>";
        echo '</tr>';
        echo '</tbody>';
    }
    echo '</table>';

}
?>
