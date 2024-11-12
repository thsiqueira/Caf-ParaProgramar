<?php
date_default_timezone_set('Brazil/East');

include 'conexao.php';
include 'consumo-banco.php';

$valorTotal = 0;
$mlTotal = 0;
$cafeTotal = 0;
$dataHoje = date('d/m/y H:i:s');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cafeímetro</title>
        <meta charset="utf-8">
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="css/cafeimetro.css" rel="stylesheet" />
    </head>
    <body>
    <form name="form_criapdf" method="post" action="">
        <input type="hidden" name="esconde_html" id="esconde_html" value="">
        <button type="button" name="btn_criapdf" class="btn btn-secondary" onclick="geraPDF();">Gerar PDF</button>
        </form>
        <div class="container" id="div-report">
            <div class="principal">

            <h4>Relatório de consumo em <?=$dataHoje?></h4>
            <table class="table">

                <?php
                $consumos = listaConsumo($conexao);
                foreach ($consumos as $consumo){
                    $valorTotal += $consumo['preco'];
                    $mlTotal += $consumo['quantidade'];
                    $cafeTotal++;
                ?>
                    <tr>
                        <td><?=$consumo['data_consumo']?></td>
                        <td><?=$consumo['hora']?></td>
                        <td><?=$consumo['cafe_nome']?></td>
                        <td><?=$consumo['quantidade']?>ml</td>
                        <td>R$<?=number_format($consumo['preco'],2,',','.')?></td>
                    </tr>
                <?php
                 }
                 ?>
            </table>
                 
            <h4>Totalizadores</h4>

            <table class="table table-striped table-bordered">
                <tr style="text-align: center">
                    <td>Cafés:</td><td><?=$cafeTotal?></td>
                    <td>Quantidade (ml):</td><td><?=$mlTotal?></td>
                    <td>R$:</td><td><?=number_format($valorTotal,2,',','.')?></td>
                </tr>
            </table>

            <div id="piechart" style="width: 900px; height: 500px;"></div>

            </div>
        </div>
       
    </body>
    </html>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Café', 'Quantidade (ml)'],
    <?php
    $consumos_cafe = listaConsumoCafe($conexao);
    foreach ($consumos_cafe as $consumo){
      $tipoDoCafe = $consumo['cafe_nome'];  
      $quantidade = $consumo['quantidade_total'];  
      echo "['{$tipoDoCafe} - {$quantidade} ml', {$quantidade}],";
    }
    ?>
  ]);

  var options = {
    title: 'Cafés mais consumidos por mim (em ml):',
    is3D: true
  };

      var chart_area = document.getElementById('piechart');
      var chart = new google.visualization.PieChart(chart_area);

      google.visualization.events.addListener(chart, 'ready', function () {
        chart_area.innerHTML = '<img src="' + chart.getImageURI() + '">';
      });

      chart.draw(data, options);
}
</script>

<script>
  function geraPDF(){
      document.getElementById('esconde_html').value = document.getElementById('div-report').innerHTML;
      document.form_criapdf.action = 'gerador-pdf.php';
      document.form_criapdf.submit();
  }
</script>

