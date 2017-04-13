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
                left: 396px;
               

            }
            #corpo{
                position: relative;
                left: 185px;
                width: 400px;
                border: 2px solid;
                border-radius: 10px;
            }
        </style>

    </head>

    <body>
        <div id="corpo">

            <h2 align="center">CADASTRO DE EMPRESAS</h2><br><br>
            <form name="Frm_cidade" method="post" action="index.php">


                Nome: <input type="text" name="edt_jur_nome" size="20" required value="<?php echo $acao == 'alterar' ? $mod->reg->JUR_NOME : ''; ?>"><br>
                CNPJ:<input type="text" name="edt_jur_cnpj" size="19" required value="<?php echo $acao == 'alterar' ? $mod->reg->JUR_CNPJ : ''; ?>"><br>
                Código da pessoa: <input type="text" name="edt_pes_codigo" required><br>
                E-mail: <select>
                    <?php echo $mod->lista_pessoa(); ?> 
                </select><br>


                <br><br>
                <input type="reset" name="btn_limpar" value="LIMPAR">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btn_enviar" value="SALVAR">
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->JUR_CODIGO : ''; ?>">



            </form>

        </div>
    </body>
</html>  