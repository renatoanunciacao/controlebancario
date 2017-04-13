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

            <h2 align="center">CADASTRO DE PESSOAS FISICAS</h2><br><br>
            <form name="Frm_cidade" method="post" action="index.php">


                Nome: <input type="text" name="edt_fis_nome" size="20" required value="<?php echo $acao == 'alterar' ? $mod->reg->FIS_NOME : ''; ?>"><br>
                CPF:<input type="text" name="edt_fis_cpf" size="18" required value="<?php echo $acao == 'alterar' ? $mod->reg->FIS_CPF : ''; ?>"><br>
                Código da pessoa: <input type="text" name="edt_pes_codigo" required><br>
                Email:<select> 
                     <?php echo $mod->lista_pessoa(); ?> 
                </select><br>
              
                    
                
                <br><br>
                <input type="reset" name="btn_limpar" value="LIMPAR">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="btn_enviar" value="SALVAR">
                <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                <input type="hidden" name="id" value="<?php echo $acao == 'alterar' ? $mod->reg->FIS_CODIGO : ''; ?>">



            </form>

        </div>
    </body>
</html>  