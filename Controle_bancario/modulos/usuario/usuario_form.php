
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background-color: lightgreen; 
            }
            #corpo{
                position: relative;
                border: 2px solid;
                border-radius: 10px;
                left: 404px;
                width: 800px;
                height: 300px;
            }
        </style>

    </head>

    <body>
        <div id="corpo"  align="center">

            <h2 align="center">CADASTRO DE USUÁRIOS</h2><br><br>
            <form name="Frm_cadastro" method="post" action="index.php">


                Nome:<input type="text" name="edt_usu_nome" size="30" value="" required><br>
                Login:<input type="text" name="edt_usu_login" size="30" value="" required><br>
                Senha:<input type="password" name="edt_usu_senha" size="20" value="" required><br>
                Permissão:<select name="edt_usu_permissao" required="required">
                    <?php echo $mod->lista_permissao(); ?>

                </select><br>
                <input type="reset" name="btn_limpar" value="LIMPAR">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btn_enviar" value="SALVAR">
                <br><a href='./login_form.php'> Voltar</a>
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->CID_CODIGO : ''; ?>">



            </form>
        </div>
    </body>
</html>
