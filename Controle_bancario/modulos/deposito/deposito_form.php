<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <div id="container">
            <form align="center"class="form-inline" name="Frm_cidade" method="post" action="index.php">
                <h2 align="center">DEPÓSITOS</h2><br><br><br>
                <div class="form-group"> 
                    Número da conta: <input type="text" class="form-control" name="edt_cont_numero" required >
                </div>
                <br><br>
                <div class="form-group">
                    Valor do depósito: <input type="text" class="form-control" name="edt_dep_valor"  required size="20" value=""><br>
                </div>
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="reset" name="btn_limpar"><span class="glyphicon glyphicon-log-out"> Limpar</span></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <butoon class="btn btn-success" type="submit" name="btn_enviar"><span class="glyphicon glyphicon-log-in"> Enviar</span></butoon>
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'depositar' ? $mod->reg->DEP_CODIGO : ''; ?>">
            </form>
        </div>
    </body>
</html>  