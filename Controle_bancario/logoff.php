<?php

session_start();
require("funcoes.php");
unset($_SESSION['ses_usu_codigo']);
unset($_SESSION['ses_usu_nome']);
unset($_SESSION['ses_usu_permissao']);
unset($_SESSION['ses_usu_qtd']);
session_destroy();
redireciona('index.php');
exit();

?>

