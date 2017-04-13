<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background-color: lightgreen; 
            }
            div{
                position: relative;
                width: 50%;
                left: 390px;
              
            }
            #corpo{
                position: relative;
                left: 184px;
                width: 400px;
                border: 2px solid;
                border-radius: 10px;
            }
        </style>

    </head>

    <body>
        <div id="corpo">

            <h2 align="center">CADASTRO DE PESSOAS</h2><br><br>
            <form name="Frm_cidade" method="post" action="index.php">

                Codigo: <input type="text" name="edt_pes_codigo" value=""><br>
                Tipo: <input type="text" name="edt_pes_tipo" size="23" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_TIPO : ''; ?>"><br>
                Endereço:<input type="text" name="edt_pes_endereco" size="19" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_ENDERECO : ''; ?>"><br>
                Telefone:<input type="text" name="edt_pes_telefone" size="20" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_TELEFONE : ''; ?>"><br>
                E-mail :<input type="text" name="edt_pes_email" size="20" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_EMAIL : ''; ?>">


                <br><br>
                <input type="reset" name="btn_limpar" value="LIMPAR">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btn_enviar" value="SALVAR">
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->PES_CODIGO : ''; ?>">



            </form>

        </div>
    </body>
</html>  