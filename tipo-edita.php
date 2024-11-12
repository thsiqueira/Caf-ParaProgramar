<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'tipo-banco.php';

$id = $_POST['id'];
$nome = $_POST['nome'];

$alterou = alteraTipo($conexao, 
$id, 
$nome);

if($alterou){
    ?>
    <p class="text-sucess">Tipo alterado para "<?=$nome?>" com sucesso.</p>
<?php
}
else{
    ?>
    <p class="text-danger">Erro ao tentar alterar o tipo <?=$nome?>.</p>
    <?php
}

?>


<?php 
include 'rodape.php';
?>