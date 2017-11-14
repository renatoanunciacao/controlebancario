
<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>


    </head>

    <body>
        <div class="container">
            <form align="center" name="Frm_cadastro" class="form-inline" method="post" action="index.php">
                <h2 align="center">CADASTRO DE USUÁRIOS</h2><br><br>
                <div class="form-group">
                    Nome:<input type="text" class="form-control" name="edt_usu_nome" size="30" value="" required>
                    <br></div><br><br>
                <div class="form-group">
                    Login:<input type="text" class="form-control" name="edt_usu_login" size="30" value="" required><br>
                </div><br><br>
                <div class="form-group">
                    Senha:<input type="password" class="form-control" name="edt_usu_senha" size="20" value="" required><br>
                </div><br><br>
                <div class="form-group">
                    Permissão:<select class="form-control" name="edt_usu_permissao" required="required">
                        <?php echo $mod->lista_permissao(); ?>

                    </select><br><br>
                </div><br><br>
                <button class="btn btn-danger" type="reset" name="btn_limpar"><span class="glyphicon glyphicon-log-out"> Limpar</span></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" name="btn_enviar" value="SALVAR"><span class="glyphicon glyphicon-log-in"> Enviar</span></button>
                <br><a href='./login_form.php'> Voltar</a>
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->CID_CODIGO : ''; ?>">



            </form>
        </div>
    </body>
</html>
