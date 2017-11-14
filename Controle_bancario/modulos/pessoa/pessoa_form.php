<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <div id="container">
            <form align="center" name="Frm_cidade" class="form-inline" method="post" action="index.php">
                <h2 align="center">CADASTRO DE PESSOAS</h2><br><br>
                <div class="form-group"> 
                    Codigo: <input type="text" class="form-control" name="edt_pes_codigo" size="20"><br><br>
                </div><br>
                <div class="form-group"> 
                    Tipo: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text"class="form-control" name="edt_pes_tipo" size="20" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_TIPO : ''; ?>"><br>
                </div><br><br>
                <div class="form-group"> 
                    Endereço:<input type="text"class="form-control" name="edt_pes_endereco" size="20" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_ENDERECO : ''; ?>"><br>
                </div><br><br>
                <div class="form-group"> 
                    Telefone:<input type="text" class="form-control"name="edt_pes_telefone" size="20" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_TELEFONE : ''; ?>"><br>
                </div><br><br>
                <div class="form-group"> 
                    E-mail :&nbsp;&nbsp;&nbsp;<input type="text" class="form-control"name="edt_pes_email" size="20" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_EMAIL : ''; ?>">
                </div><br><br>

                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="reset" name="btn_limpar" value="LIMPAR"><span class="glyphicon glyphicon-log-out"> Limpar</span></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-success" type="submit" name="btn_enviar" value="SALVAR"><span class="glyphicon glyphicon-log-in"> Limpar</span></button>
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_CODIGO : ''; ?>">



            </form>

        </div>
    </body>
</html>  