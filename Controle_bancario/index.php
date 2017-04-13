
<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <?php
            session_start();
            require('config.php');
            require('bibliotecas/adodb5/adodb.inc.php');
            require('conecta.php');
            require('funcoes.php');
            ?>
            <?php
            if (isset($_SESSION['ses_usu_codigo'])) {
                ?>
            <header class="container-fluid">
                <?php echo "<h3> Olá ".$_SESSION['ses_usu_nome']."</h3>" ?>
            </header>
                <nav class="nav navbar-nav">
                    <li><a href="logoff.php">SAIR</a></li>
                    <li><a href="?menu=saque">SAQUES</a></li>                  
                    <li><a href="?menu=deposito">DEPÓSITOS</a></li>

                    <?php
                    if ($_SESSION['ses_usu_codigo'] == 1) {
                        ?>
                    <li> <a href="?menu=pessoa" >PESSOAS</a></li>
                    <li><a href="?menu=fisica">FÍSICAS</a></li>
                    <li><a href="?menu=juridica">JURIDICAS</a></li>
                    <li><a href="?menu=conta">CONTAS</a></li>
                    <li><a href="?menu=usuario">USUÁRIOS</a></li>
                    </nav>
                    <?php
                }
            }
            ?> 

            <?php
            if (isset($_SESSION['ses_usu_codigo'])) {
                if (isset($_REQUEST['menu'])) {
                    $menu = $_REQUEST['menu'];
                    require ('modulos/' . $menu . '/' . $menu . '.php');
                } else {
                    echo "Escolha uma opção do menu";
                }
            } else {
                require('login_form.php');
            }
            ?>
        </div>
    </body>
</html>

