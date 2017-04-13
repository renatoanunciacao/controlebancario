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
            <table cellpadding="0" width="50%" align="center">

                <tr  border="1px solid">
                    <th colspan="4">CADASTRO DE USUARIOS</th>
                    <td>
                        <form name="frm_busca" method="post" action="index.php" enctype="multipart/form-data">
                            <input type="search" name="edt_busca" size="30" value=""/>
                            <input type="submit" name="" value="BUSCAR" />
                            <input type="hidden" name="menu" value="<?php echo $menu;?>">
                            <input type="hidden" name="acao" value="listar">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><a href="?menu=usuario&acao=listar&ord=1">Código</a></td>
                    <td><a href="?menu=usuario&acao=listar&ord=2">Nome</a></td>
                    <td><a href="?menu=usuario&acao=listar&ord=3">Permissão</a></td>
                    <td colspan="2"><a href="?menu=usuario&acao=incluir">Incluir</a></td>
                </tr>
                
                <?php
                while ($mod->reg = $mod->res->FetchNextObject()) {
                    ?>
                <tr>
                        <td><?php echo $mod->reg->USU_CODIGO; ?></td>
                        <td><?php echo $mod->reg->USU_NOME; ?></td>
                        <td><?php echo $mod->reg->USU_PERMISSAO; ?></td>
                        <td><a href="?menu=usuario&acao=alterar&id=<?php echo $mod->reg->USU_CODIGO; ?>">Alterar</a></td>
                        <td><a href="javascript:if(confirm('Confirma a exclusão deste registro?')){location='?menu=usuario&acao=excluir&id=<?php echo $mod->reg->USU_CODIGO; ?>';}">Excluir</a></td>

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
