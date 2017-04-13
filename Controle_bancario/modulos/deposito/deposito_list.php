<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background-color: lightgreen; 
            }
            table{
                border: 2px solid black;
                border-color: black;
                border-radius: 4px;
            }
            table tr td{
                border: 1px solid black;
                border-color: black;
                border-radius: 2px;
                background-color: lightseagreen;
            }
            table tr td:hover{
                background-color: cyan;
            }
            div{
                border: none;
            }

        </style>

    </head>
    <body>


        <div>  
            <table cellpadding="1" width="50%" align="center">

                <tr  border="1px solid">
                    <th colspan="4">DEPÓSITOS</th>
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
                    <?php if ($_SESSION['ses_usu_codigo'] == 1) {
                        ?>
                        <td><a href="?menu=deposito&acao=listar&ord=1">Código</a></td>
                        <td><a href="?menu=deposito&acao=listar&ord=2">Número da conta</a></td>
                        <td><a href="?menu=deposito&acao=listar&ord=3">Valor do depósito</a></td>
                        <td><a href="?menu=deposito&acao=listar&ord=4">Data do depósito</a></td>                
                        <td colspan="2"><a href="?menu=deposito&acao=depositar">Depositar</a></td>
                    </tr>
                    <?php
                } else {
                    ?>


                    <td><a href="?menu=deposito&acao=listar&ord=1">Código</a></td>
                    <td><a href="?menu=deposito&acao=listar&ord=3">Valor do depósito</a></td>
                    <td><a href="?menu=deposito&acao=listar&ord=4">Data do depósito</a></td>                
                    <?php
                }
                ?>                    

                <?php
                while ($mod->reg = $mod->res->FetchNextObject()) {
                    ?>

                    <tr>
                        <?php if ($_SESSION['ses_usu_codigo'] == 1) {
                            ?>
                            <td><?php echo $mod->reg->DEP_CODIGO; ?></td>
                            <td><?php echo $mod->reg->CONT_NUMERO; ?></td>
                            <td><?php echo $mod->reg->DEP_VALOR; ?></td>
                            <td><?php echo $mod->reg->DEP_DATA; ?></td>
                            <?php
                        } else {
                            ?>
                    <td><?php echo $mod->reg->DEP_CODIGO; ?></td>
                            <td><?php echo $mod->reg->DEP_VALOR; ?></td>
                            <td><?php echo $mod->reg->DEP_DATA; ?></td>
                            <?php
                        }?>
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
