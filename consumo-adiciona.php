<?php 
date_default_timezone_set('Brazil/East');

include 'cabecalho-menu.php';
include 'conexao.php';
include 'consumo-banco.php';

$data = (array_key_exists('data', $_POST) && $_POST['data'] != '') ? $_POST['data'] : date('Y-m-d');
$hora = (array_key_exists('hora', $_POST) && $_POST['hora'] != '') ? $_POST['hora'] : date('H:i');
$quantidade = (array_key_exists('quantidade', $_POST) && $_POST['quantidade'] != '') ? $_POST['quantidade'] : 0;
$preco = (array_key_exists('preco', $_POST) && $_POST['preco'] != '') ? $_POST['preco'] : 0;
$cafe_id = $_POST['cafe_id'];

$adicionou = adicionaConsumo($conexao, 
$data, 
$hora, 
$cafe_id,
$quantidade,
$preco);
if ($adicionou){
   include 'rodape.php';
   header("Location: consumo-lista.php");
   die();
}
else{
    ?>
    <p class="text-danger">Erro ao tentar inserir o registro.</p>
    <?php
}

?>


<?php 
include 'rodape.php';
?>