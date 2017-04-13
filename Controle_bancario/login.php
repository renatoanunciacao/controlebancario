<?php

session_start();
require('config.php');
require('bibliotecas/adodb5/adodb.inc.php');
require('conecta.php');
require('funcoes.php');

if($_POST['edt_usu_login'] == '')
{
    mensagem('Informe o usuário.');
    redireciona('index.php');
}
else if($_POST['edt_usu_senha'] == '')
{
    mensagem('Informe a senha.');
    redireciona('index.php');
}
else
{
    $con = new conecta();
    $login = limpa_caracteres($_POST['edt_usu_login']);
    $senha = limpa_caracteres($_POST['edt_usu_senha']);
    
    echo $login.'<br>';
    echo $senha;
    
    $sql = "select * from tblusuario where USU_LOGIN = '$login' and USU_SENHA = md5('$senha')";
    $res = $con->bd->Execute($sql);
    if($res->RecordCount() > 0)
    {
        $reg = $res->FetchNextObject();
        $_SESSION['ses_usu_codigo'] = $reg->USU_CODIGO;
        $_SESSION['ses_usu_nome'] = $reg->USU_NOME;
        $_SESSION['ses_usu_permissao'] = $reg->USU_PERMISSAO;
        $_SESSION['ses_usu_qtd'] = $reg->USU_QTD_ACESSO;
        
       $sql_atualiza = "update tblusuario set USU_DT_ACESSO = current_date, USU_HR_ACESSO = current_time, USU_QTD_ACESSO = ".($_SESSION['ses_usu_qtd'] + 1)." where USU_CODIGO = ".$_SESSION['ses_usu_codigo'];
       $con->bd->Execute($sql_atualiza);
       redireciona('index.php');
    }
    else
    {
        mensagem('Acesso negado!\nDados invalidos.');
        redireciona('index.php');
    }
}


?>