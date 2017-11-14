<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <form class="navbar-form" align="center" name="Frm_cidade" method="post" action="index.php">
            <div class="container">

                <h2 align="center">CADASTRO DE PESSOAS FISICAS</h2><br><br>

                <div class="form-group">
                    <br><br>
                    Número da conta: <input type="text" name="edt_cont_numero" size="20" class="form-control" required value="<?php echo $acao == 'alterar' ? $mod->reg->CONT_NUMERO : ''; ?>">
                    <br><br>
                    Código da pessoa:<input type="text" name="edt_pes_codigo" class="form-control"  required value="">
                    <br>
                </div>
                <br><br>
                Tipo:
                <div class="form-group">
                    &nbsp;&nbsp;
                    <select class="form-control">
                        <?php echo $mod->lista_tipo(); ?>
                    </select>

                </div>
                <br><br>
                Email:
                <div class="form-group"> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select class="form-control"> 
                        <?php echo $mod->lista_email(); ?> 
                    </select>
                </div><br>

                <br><br>
                <div class="form-group">
                    <button type="reset" class="btn btn-danger" name="btn_limpar"><span class="glyphicon glyphicon-log-out"> Limpar</span></button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit"class="btn btn-success" name="btn_enviar"><span class="glyphicon glyphicon-log-in"> Enviar</span></button>
                </div>
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->CONT_CODIGO : ''; ?>">
            </div>

        </form>

    </body>
</html>  