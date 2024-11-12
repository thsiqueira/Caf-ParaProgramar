<?php
include ("pdf.php");

$o_arquivo = "relatorio-consumo.pdf";

$html = '<style>';
$html .= file_get_contents('css/bootstrap/bootstrap.css');
$html .= file_get_contents('css/cafeimetro.css');
$html .= '</style>';
$html .= $_POST['esconde_html'];

$pdf = new Pdf();
$pdf->load_html($html);
$pdf->render();
$pdf->stream($o_arquivo, array("Attachment" => false));
?>