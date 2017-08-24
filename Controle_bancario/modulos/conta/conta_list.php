<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>


        <div>  
            <table class="table table-hover">

                <tr>
                    <th colspan="4">CADASTRO DE CONTAS</th>
                    <td>
                        <form name="frm_busca" method="post" action="index.php" enctype="multipart/form-data">
                            <input type="search" name="edt_busca" size="30" value=""/>
                            <input type="submit" name=" " value="BUSCAR" />
                            <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                            <input type="hidden" name="acao" value="listar">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><a href="?menu=conta&acao=listar&ord=1">Código</a></td>
                    <td><a href="?menu=conta&acao=listar&ord=2">Número da conta</a></td>
                    <td><a href="?menu=conta&acao=listar&ord=3">Valor total da conta</a></td>
                    <td><a href="?menu=conta&acao=listar&ord=3">Código da pessoa</a></td>
                    <td colspan="2"><a href="?menu=conta&acao=incluir">Incluir</a></td>
                </tr>

                <?php
                while ($mod->reg = $mod->res->FetchNextObject()) {
                    ?>
                    <tr>
                        <td><?php echo $mod->reg->CONT_CODIGO; ?></td>
                        <td><?php echo $mod->reg->CONT_NUMERO; ?></td>
                        <td><?php echo $mod->reg->CONT_VALOR_TOTAL; ?></td>
                        <td><?php echo $mod->reg->PES_CODIGO; ?></td>

                    </tr>


                    <?php
                }
                ?>
                <tr>
                    <td colspan="5" >
                        <?php
                        echo 'Página: ' . $mod->pagina . ' de ' . ceil($mod->total() / config_reg_pg) . '<br>';
                        echo $mod->paginacao();
                        ?>
                    </td>
                </tr>

            </table>
        </div>
    </body>
</html>
