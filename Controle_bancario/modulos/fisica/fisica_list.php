<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
    <body>

         
        <div>  
            <table class="table table-hover" >

                <tr>
                    <th colspan="4">CADASTRO DE PESSOAS FISICAS</th>
                    <td>
                        <form name="frm_busca" method="post" action="index.php" enctype="multipart/form-data">
                            <input type="search" name="edt_busca" size="30" value=""/>
                            <input type="submit" name=" " value="BUSCAR" />
                            <input type="hidden" name="menu" value="<?php echo $menu;?>">
                            <input type="hidden" name="acao" value="listar">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><a href="?menu=fisica&acao=listar&ord=1">Código</a></td>
                    <td><a href="?menu=fisica&acao=listar&ord=2">Nome</a></td>
                    <td><a href="?menu=fisica&acao=listar&ord=3">CPF</a></td>
                    <td><a href="?menu=fisica&acao=listar&ord=3">Código da pessoa</a></td>
                    <td colspan="2"><a href="?menu=fisica&acao=incluir">Incluir</a></td>
                </tr>
                
                <?php
                while ($mod->reg = $mod->res->FetchNextObject()) {
                    ?>
                <tr>
                        <td><?php echo $mod->reg->FIS_CODIGO; ?></td>
                        <td><?php echo $mod->reg->FIS_NOME; ?></td>
                        <td><?php echo $mod->reg->FIS_CPF; ?></td>
                         <td><?php echo $mod->reg->PES_CODIGO; ?></td>
                   
                        <td><a href="?menu=fisica&acao=alterar&id=<?php echo $mod->reg->FIS_CODIGO; ?>">Alterar</a></td>
                        <td><a href="javascript:if(confirm('Confirma a exclusão deste registro?')){location='?menu=fisica&acao=excluir&id=<?php echo $mod->reg->FIS_CODIGO; ?>';}">Excluir</a></td>

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
