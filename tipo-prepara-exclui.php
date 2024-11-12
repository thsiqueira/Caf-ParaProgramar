<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'tipo-banco.php';

$id = $_POST['id'];

$tipo = buscaTipoPorID($conexao, $id);
$tipos = listaTipo($conexao);
$tipos_vinculados = tiposVinculados($conexao, $id);
$msg = ($tipos_vinculados == 0) ? "" : "Atenção!<br/>Existem cafés associados a este tipo.<br/>Se você confirmar a remoção, todos os cafés associados serão excluídos.";
?>

<h1>Confirma a remoção deste tipo?</h1>
<form action="tipo-exclui.php" method="post">
    <input type="hidden" name="id" value="<?=$tipo['id']?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$tipo['nome']?>" readonly /></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Remover</button> </td>
        </tr>
    </table>
</form>

<div id="msg-vinculo-cafe"><p class="text-danger"><?=$msg?></p></div>



<?php 
include 'rodape.php';
?>