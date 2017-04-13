<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            
               body{
                background-color: lightgreen; 
            }
           
            .corpo{
                position: absolute;
                left: 520px;
                width: 50%;
                top: 253px;
                width: 30%;
             
                
            }
        </style>

    </head>

    <body>
 <div class="corpo">

            <h1>CONTROLE BANCÁRIO</h1><br><br>
            <form name="Frm_login" method="post" action="login.php">

                <label>
                    Usuário: <input type="text"  name="edt_usu_login" size="30" value="" required><br><br>
                </label>
                <label>
                    Senha: <input type="password" name="edt_usu_senha" size="30" value="" required><br><br>
                </label>
               
                

             
                <br><br>
                <input type="reset" class="btn-danger" name="btn_limpar" value="LIMPAR">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn-success" name="btn_enviar" value="LOGAR">
               



            </form>
 </div>
    </body>
</html>
