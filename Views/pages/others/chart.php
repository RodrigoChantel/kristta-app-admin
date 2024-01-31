<div class="px-4 py-2">
  <canvas id="myChart"></canvas>
</div>

<script src="node_modules/chart.js/dist/chart.umd.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      datasets: [{
        label: 'Entrada R$',
        <?php
            $listKrtGanhos = new showUsers;
            $listKrtGanhos = $listKrtGanhos->krtGanhosMesAno();
        ?>
        data: <?php echo "[{$listKrtGanhos["01/2023"]}, {$listKrtGanhos["02/2023"]}, {$listKrtGanhos["03/2023"]}, {$listKrtGanhos["04/2023"]}, {$listKrtGanhos["05/2023"]}, {$listKrtGanhos["06/2023"]}, {$listKrtGanhos["07/2023"]}, {$listKrtGanhos["08/2023"]}, {$listKrtGanhos["09/2023"]}, {$listKrtGanhos["10/2023"]}, {$listKrtGanhos["11/2023"]}, {$listKrtGanhos["12/2023"]} ]" ?>,
        borderWidth: 3
      }, {
        label: 'Saída R$',
        <?php
            $listKrtGastos = new showUsers;
            $listKrtGastos = $listKrtGastos->krtGastosMesAno();
        ?>
        data: <?php echo "[{$listKrtGastos["01/2023"]}, {$listKrtGastos["02/2023"]}, {$listKrtGastos["03/2023"]}, {$listKrtGastos["04/2023"]}, {$listKrtGastos["05/2023"]}, {$listKrtGastos["06/2023"]}, {$listKrtGastos["07/2023"]}, {$listKrtGastos["08/2023"]}, {$listKrtGastos["09/2023"]}, {$listKrtGastos["10/2023"]}, {$listKrtGastos["11/2023"]}, {$listKrtGastos["12/2023"]} ]" ?>,
        borderWidth: 3
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Gráfico Financeiro <?php echo date('Y'); ?> '
        }
      }
    }
  });

</script>
 