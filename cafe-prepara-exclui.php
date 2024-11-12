<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'cafe-banco.php';
include 'tipo-banco.php';

$id = $_POST['id'];

$cafe = buscaCafePorID($conexao, $id);
$tipos = listaTipo($conexao);
?>

<h1>Confirma a remoção deste Café?</h1>
<form action="cafe-exclui.php" method="post">
    <input type="hidden" name="id" value="<?=$cafe['id']?>" />
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$cafe['nome']?>" readonly /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea class="form-control" name="descricao" readonly><?=$cafe['descricao']?></textarea></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td>
                <select class="form-control" name="tipo_id" disabled>
                    <?php
                    foreach($tipos as $tipo)
                    {
                        $opcaoSelecionada = ($cafe['tipo_id'] == $tipo['id']) ? "selected='selected'" : "";
                    ?>
                    <option value="<?=$tipo['id']?>" <?=$opcaoSelecionada?> > <?=$tipo['nome']?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Remover</button> </td>
        </tr>
    </table>
</form>



<?php 
include 'rodape.php';
?>