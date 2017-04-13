<!DOCTYPE html>
<html>
    <head>
        <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>


        <h2 align="center">SAQUES</h2><br><br>
        <div class="container">
            <form class="form-inline" name="Frm_cidade" method="post" action="index.php">


                <label>Número da conta: <input type="text" class="input-lg alert-info" name="edt_cont_numero" placeholder="Informe o número da conta" size="20" required value=""><lable>
                        <br><br> <labe> Valor do saque: <input type="text" placeholder="Valor do saque" class="input-lg alert-info" name="edt_saq_valor" size="23" required value=""></label>



                            <input type="hidden" name="menu" value="<?php echo $menu; ?>">
                            <input type="hidden" name="acao" value="<?php echo 'gravar_' . $acao; ?>">
                            <input type="hidden" name="id" value="<?php echo $acao == 'sacar' ? $mod->reg->SAQ_CODIGO : ''; ?>">


                            <hr />
                            <div id="actions" class="row">
                                <div class="col-md-12">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="btn_enviar" class="btn btn-primary input-lg">Salvar</button>
                                    <button type="reset" name="btn_limpar" class="btn btn-danger input-lg">Cancelar</button>

                                </div>
                            </div>
                            

                         </form>
                     </div>

        </body>
</html>  