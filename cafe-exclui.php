<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'cafe-banco.php';

$id = $_POST['id'];
$nome = $_POST['nome'];

$excluiu = removeCafe($conexao, $id);
if ($excluiu){
    ?>
    <p class="text-sucess">Registro <?=$nome?> removido com sucesso.</p>
<?php
}
else{
    ?>
    <p class="text-danger">Erro ao tentar remover o registro <?=$nome?>.</p>
    <?php
}

?>

<?php 
include 'rodape.php';
?>