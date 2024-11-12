<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'tipo-banco.php';

$nome = $_POST['nome'];
$existeTipo = tiposPorNome($conexao, $nome);
    if($existeTipo == 0){
        $adicionou = adicionaTipo($conexao, $nome);
        if ($adicionou){
        ?>
        <p class="text-sucess">Tipo <?=$nome?> inserido com sucesso.</p>
        <?php
        }
        else{
        ?>
        <p class="text-danger">Erro ao tentar inserir o tipo <?=$nome?>.</p>
        <?php
        }
    }
    else {
        ?>
        <p class="text-danger"> "O tipo de café "<?=$nome?>" já existe na lista de tipos.</p>
        <?php
    }

?>


<?php 
include 'rodape.php';
?>