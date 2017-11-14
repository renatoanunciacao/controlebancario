<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>


    </head>

    <body>
        <div id="corpo">

            <h2 align="center">CADASTRO DE EMPRESAS</h2><br><br>
            <form align="center" name="Frm_cidade" class="form-inline" method="post" action="index.php">

                <div class="form-group">
                    Nome: <input type="text" class="form-control" name="edt_jur_nome" size="20" required value="<?php echo $acao == 'alterar' ? $mod->reg->JUR_NOME : ''; ?>"><br>
                </div><br><br>
                <div class="form-group">
                    CNPJ:<input type="text" class="form-control" name="edt_jur_cnpj" size="20" required value="<?php echo $acao == 'alterar' ? $mod->reg->JUR_CNPJ : ''; ?>"><br>
                </div><br><br>
                <div class="form-group">
                    Pessoa: <input class="form-control" type="text" name="edt_pes_codigo" required><br>
                </div><br><br>
                <div class="form-group">
                    E-mail: <select class="form-control" required>
                        <?php echo $mod->lista_pessoa(); ?> 
                    </select><br>
                </div><br><br>


                <br><br>
                <button class="btn btn-danger" type="reset" name="btn_limpar"><span class="glyphicon glyphicon-log-out"> Limpar</span></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" name="btn_enviar"><span class="glyphicon glyphicon-log-in"> Enviar</span></button>
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->JUR_CODIGO : ''; ?>">



            </form>

        </div>
    </body>
</html>  