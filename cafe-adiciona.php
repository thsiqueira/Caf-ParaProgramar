<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'cafe-banco.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$tipo_id = $_POST['tipo_id'];

$adicionou = adicionaCafe($conexao, 
$nome, 
$descricao, 
$tipo_id);
if ($adicionou){
    ?>
    <p class="text-sucess">Registro <?=$nome?> inserido com sucesso.</p>
<?php
}
else{
    ?>
    <p class="text-danger">Erro ao tentar inserir o registro <?=$nome?>.</p>
    <?php
}

?>


<?php 
include 'rodape.php';
?>