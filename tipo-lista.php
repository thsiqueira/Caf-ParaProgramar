<?php
include 'cabecalho-menu.php';
include 'conexao.php';
include 'tipo-banco.php';
?>
     <table class="table table-striped table-bordered">

        <?php
        $tipos = listaTipo($conexao);
        foreach ($tipos as $tipo){
        ?>
            <tr>
                <td><?=$tipo['nome']?></td>
                <td>
                    <form name="form-altera" method="post" action="tipo-form-edita.php">
                        <input type="hidden" name="id" value="<?=$tipo['id']?>" />
                        <button class="btn btn-primary">Alterar</button>
                    </form>
                </td>
                <td>
                    <?php
                    $tipos_vinculados = tiposVinculados($conexao, $tipo['id']);
                    $status_botao = ($tipos_vinculados == 0) ? "" : "disabled";
                    ?>
                <form name="form-remove" method="post" action="tipo-prepara-exclui.php">
                        <input type="hidden" name="id" value="<?=$tipo['id']?>" />
                        <button class="btn btn-danger" <?=$status_botao?> >Remover</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

<?php 
include 'rodape.php';
?>
