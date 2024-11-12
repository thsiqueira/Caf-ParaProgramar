<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'consumo-banco.php';

$id = $_POST['id'];

$excluiu = removeConsumo($conexao, $id);
if ($excluiu){
   include 'rodape.php';
   header("Location: consumo-lista.php");
   die();
}
else{
    ?>
    <p class="text-danger">Erro ao tentar remover o registro.</p>
    <?php
}

?>

<?php 
include 'rodape.php';
?>