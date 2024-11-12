<?php 
include 'cabecalho-menu.php';

?>

<h1>Adicionar Tipo</h1>
<form action="tipo-adiciona.php" method="post">
    <table class="table">
        <tr>
            <td>Nome</td>
            <td><input class="form-control" type="text" name="nome" value="" /></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary" type="submit">Salvar</button> </td>
        </tr>
    </table>
</form>



<?php 
include 'rodape.php';
?>