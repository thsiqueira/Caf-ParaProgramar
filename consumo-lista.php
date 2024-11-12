<?php
include 'cabecalho-menu.php';
include 'conexao.php';
include 'consumo-banco.php';
?>
<h1>O que eu já consumi:</h1>
     <table class="table table-striped table-bordered">

        <?php
        $consumos = listaConsumo($conexao);
        foreach ($consumos as $consumo){
        ?>
            <tr>
                <td><?=$consumo['data_consumo']?></td>
                <td><?=$consumo['hora']?></td>
                <td><?=$consumo['cafe_nome']?></td>
                <td><?=$consumo['quantidade']?>ml</td>
                <td>R$<?=number_format($consumo['preco'],2,',','.')?></td>
                <td>
                <form name="form-remove" method="post" action="consumo-exclui.php">
                        <input type="hidden" name="id" value="<?=$consumo['consumo_id']?>" />
                        <button class="btn btn-danger">Remover</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <button class="btn btn-primary" onclick="window.location.href='consumo-form-adiciona.php'">Mais café</button><br><br>
    <button class="btn btn-secondary" onclick="window.open('consumo-lista-planilha.php', '_blank')">Criar planilha</button><br><br>
    <button class="btn btn-secondary" onclick="window.open('consumo-lista-report.php', '_blank')">Criar relatório (PDF)</button><br><br>

<?php 
include 'rodape.php';
?>
