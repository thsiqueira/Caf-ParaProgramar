<?php
include 'conexao.php';
include 'consumo-banco.php';


$o_arquivo = "meu-consumo.xls";


header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment; filename="' . $o_arquivo . '"');
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Description: Dados gerados via PHP.');


$html = "<meta charset='utf-8'>";
$html .= "<table border='1'>";
$html .= "<tr>
            <td>Data consumo</td>
            <td>Hora consumo</td>
            <td>Café</td>
            <td>Quantidade ml</td>
            <td>R$ Preço</td>
          </tr>";


$consumos = listaConsumo($conexao);


foreach ($consumos as $consumo) {
    $html .= "<tr>
                <td>{$consumo['data_consumo']}</td>
                <td>{$consumo['hora']}</td>
                <td>{$consumo['cafe_nome']}</td>
                <td>{$consumo['quantidade']}</td>
                <td>R$ {$consumo['preco']}</td>
              </tr>";
}


$html .= "</table>";


echo $html;
?>
