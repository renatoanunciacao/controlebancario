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
                    <th>SAQUES</th>
                    <td colspan="4">
                        <form name="frm_busca" method="post" action="index.php" enctype="multipart/form-data">
                            <input type="search" name="edt_busca" size="30" value=""/>
                            <input type="submit" name="" class="btn btn-info alert-info" value="BUSCAR" />
                            <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                            <input type="hidden" name="acao" value="listar">
                        </form>
                    </td>
                </tr>
                <tr>
                    <?php if ($_SESSION['ses_usu_codigo'] == 1) {
                        ?>
                    <td><a href="?menu=saque&acao=listar&ord=1">Código</a></td>
                        <td><a href="?menu=saque&acao=listar&ord=2">Número da conta</a></td>
                        <td><a href="?menu=saque&acao=listar&ord=3">Valor do saque</a></td>
                        <td><a href="?menu=saque&acao=listar&ord=3">Data do saque</a></td>
                        <td><button id="sacar" class="btn btn-success"><span class="glyphicon glyphicon-euro"><a href="?menu=saque&acao=sacar"> Sacar</span></a></button></td>
                        <?php
                    } else {
                        ?>
                        <td><a href="?menu=saque&acao=listar&ord=1">Código</a></td>
                        <td><a href="?menu=saque&acao=listar&ord=3">Valor do saque</a></td>
                        <td><a href="?menu=saque&acao=listar&ord=3">Data do saque</a></td>
                        <td colspan="2"><a href="?menu=saque&acao=sacar">Sacar</a></td>
                    </tr>
                    <?php
                    }
 ?>

                <?php
                while ($mod->reg = $mod->res->FetchNextObject()) {
                    ?>
                    <tr>
                    <?php if ($_SESSION['ses_usu_codigo'] == 1) {
                        ?>
                            <td><?php echo $mod->reg->SAQ_CODIGO; ?></td>
                            <td><?php echo $mod->reg->CONT_NUMERO; ?></td>
                            <td><?php echo $mod->reg->SAQ_VALOR; ?></td>
                            <td><?php echo $mod->reg->SAQ_DATA; ?></td>
        <?php
    } else { 

?>
        
                            <td><?php echo $mod->reg->SAQ_CODIGO; ?></td>
                            <td><?php echo $mod->reg->SAQ_VALOR; ?></td>
                            <td><?php echo $mod->reg->SAQ_DATA; ?></td>
                            <?php
                        }
                        ?>


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
