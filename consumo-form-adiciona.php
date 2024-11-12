<?php 
include 'cabecalho-menu.php';
include 'conexao.php';
include 'cafe-banco.php';

$cafes = listaCafe($conexao);
?>

<h1>Novo consumo</h1>
<form action="consumo-adiciona.php" method="post">
    <table class="table">
        <tr>
            <td>Data</td>
            <td><input class="form-control" type="date" name="data" /></td>
        </tr>
        <tr>
            <td>Hora</td>
            <td><input class="form-control" type="time" name="hora" /></td>
        </tr>
        <tr>
            <td>Café</td>
            <td>
                <select class="form-control" name="cafe_id">
                    <?php
                    foreach($cafes as $cafe)
                    {
                    ?>
                    <option value="<?=$cafe['id']?>">  <?=$cafe['nome_cafe']?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Quatidade (ml)</td>
            <td><input class="form-control" type="number" name="quantidade" min="0" /></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td><input class="form-control" type="double" name="preco" min="0.00" max="999.99" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Adicionar consumo</button> </td>
        </tr>
    </table>
</form>



<?php 
include 'rodape.php';
?>