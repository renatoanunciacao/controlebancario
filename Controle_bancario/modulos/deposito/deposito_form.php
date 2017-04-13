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
                left: 380px;
                

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

            <h2 align="center">DEPÓSITOS</h2><br><br>
            <form name="Frm_cidade" method="post" action="index.php">


                Número da conta: <input type="text" name="edt_cont_numero" required size="20" value=""><br>
                Valor do depósito: <input type="text" name="edt_dep_valor"  required size="20" value=""><br>




                <br><br>
                <input type="reset" name="btn_limpar" value="LIMPAR">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btn_enviar" value="SALVAR">
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'depositar' ? $mod->reg->DEP_CODIGO : ''; ?>">



            </form>

        </div>
    </body>
</html>  