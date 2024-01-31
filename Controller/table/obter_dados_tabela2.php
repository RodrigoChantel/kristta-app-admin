<?php
include_once('../../Config/conection.php');
if (isset($_POST['clienteId'])) {
    $clienteId = $_POST['clienteId'];


    function searchPlans() {
        $conexao = new connect;
        $conexao = $conexao->connection();

        $clienteFaturamento = $_POST['clienteFaturamento'];
        $faturamentoFormatado = date('m/Y', strtotime($clienteFaturamento));
    
        // Consulta para buscar a lista de clientes
        $sql = "SELECT * FROM companies_plans WHERE CP_CLIENT_ID = '{$_POST['clienteId']}' AND CP_ACTIVE = '1' ";
        $result = mysqli_query($conexao, $sql);
    
    
        $requestsPlans = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $requestsPlans[] = $row;
            }
        }
    
        return $requestsPlans;
    }


    $requestsPlans = searchPlans();
    // Monta a tabela com os dados retornados
    echo '<table class="table table-hover">';
    echo '<thead><tr><th scope="col">ID</th><th scope="col">Descrição</th><th scope="col">Conclusão</th><th scope="col">Valor</th><th scope="col">Ação</th></tr></thead>';

    foreach ($requestsPlans as $item) {
        echo '<tbody>';
        echo '<tr>';
        echo "<td scope='row'>" . $item['CP_ID'] . '</td>';
        echo '<td>' . $item['CP_CLIENT_ID'] . '</td>';
        echo '<td>' . $item['CP_PLAN_ID'] . '</td>';
        echo "<td style='white-space: nowrap'>R$ " . number_format($item['CP_VALUE'], 2, ',', '.') . '</td>';
        echo '</tr>';
        echo '</tbody>';
    }
    echo '</table>';
}
?>
