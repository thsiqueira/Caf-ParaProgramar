<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'tipo-banco.php';

$id = $_POST['id'];
$nome = $_POST['nome'];

$excluiu = removeTipo($conexao, $id);
if ($excluiu){
    ?>
    <p class="text-sucess">Tipo <?=$nome?> removido com sucesso.</p>
<?php
}
else{
    ?>
    <p class="text-danger">Erro ao tentar remover o tipo <?=$nome?>.</p>
    <?php
}

?>

<?php 
include 'rodape.php';
?>