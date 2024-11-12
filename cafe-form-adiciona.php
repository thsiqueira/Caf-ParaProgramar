<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'cafe-banco.php';
include 'tipo-banco.php';

$tipos = listaTipo($conexao);
?>

<h1>Adicionar Café</h1>
<form action="" method="post" name="formcafe">
    <table class="table">
        <tr>
            <td>Nome *</td>
            <td><input class="form-control" type="text" name="nome" id="nome" value="" /></td>
        </tr>
        <tr>
            <td>Descrição *</td>
            <td><textarea class="form-control" name="descricao" id="descricao" ></textarea></td>
        </tr>
        <tr>
            <td>Tipo *</td>
            <td>
                <select class="form-control" name="tipo_id">
                    <?php
                    foreach($tipos as $tipo)
                    {
                        $opcaoSelecionada = ($cafe['tipo_id'] == $tipo['id']) ? "selected='selected'" : "";
                    ?>
                    <option value="<?=$tipo['id']?>">  <?=$tipo['nome']?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="button" onclick="validaForm('cafe-adiciona.php')">Salvar</button> </td>
        </tr>
    </table>
</form>

<div id="msg-erro"><p class="text-danger"></p></div>



<?php 
include 'rodape.php';
?>

<script src="js/funcoes/cafe.js"></script>