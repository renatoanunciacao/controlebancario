<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .corpo{
                width: 450px;
                position: relative;
                margin: auto;
                top: 250px;
                    
            }
        </style>
    </head>

    <body>
        <div class="corpo">

            <h1>CONTROLE BANCÁRIO</h1><br><br>
            <form class="form-control-static" name="Frm_login" method="post" action="login.php">

                <label>
                    Usuário: <input type="text" name="edt_usu_login" size="30" value="" required><br><br>
                </label><br>
                <label>
                      Senha:  <input type="password" name="edt_usu_senha" size="30" value="" required><br><br>
                </label><br>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn-success btn-lg" name="btn_enviar" ><span class="glyphicon glyphicon-log-in" >   Login</span></button>

                <button type="reset" class="btn btn-danger btn-lg" name="btn_limpar" ><span class="glyphicon glyphicon-remove-sign"> Cancelar</span></button>
                

            </form>
        </div>
    </body>
</html>
