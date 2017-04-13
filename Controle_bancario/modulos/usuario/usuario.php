<?php

$dir = 'modulos/usuario/';
require($dir . 'usuario_class.php');
$mod = new usuario();
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
} else {
    $acao = 'listar';
}
switch ($acao) {
    case 'listar':
        $mod->listar();
        require($dir . 'usuario_list.php');
        break;
    case 'incluir':

        require ($dir . 'usuario_form.php');
        break;
    case 'gravar_incluir':
         if($_SESSION['ses_usu_permissao'] < 2)
        {
        if ($mod->verifica_duplicidade($_POST['edt_usu_login'], $_POST['edt_usu_permissao']) > 0) {
            mensagem(config_msg_duplicidade);
        } else {
            if ($mod->gravar_incluir($_POST['edt_usu_nome'],$_POST['edt_usu_login'], $_POST['edt_usu_senha'],$_POST['edt_usu_permissao'])) {
                mensagem(config_msg_incluir);
            } else {
                mensagem(config_msg_erro);
            }
        }
        }
        else
            mensagem('Você não tem permissão para Incluir!');
        $mod->listar();
        require ($dir . 'usuario_list.php');
        break;
    case 'excluir':
        if($_SESSION['ses_usu_permissao'] < 2)
        {
            if ($mod->excluir($_GET['id'])) {
                mensagem(config_msg_excluir);
            } else {
                mensagem(config_msg_erro);
            }
        }        
        else
            mensagem('Você não tem permissão para excluir!');
        $mod->listar();
        require 'usuario_list.php';
        break;
    case 'alterar' :
        $mod->alterar($_GET['id']);
        require($dir . 'usuario_form.php');
        break;
    case 'gravar_alterar' :
        $retorno = $mod->verifica_duplicidade($_POST['edt_usu_nome'], $_POST['edt_usu_permissao'], $_POST['id']);
        if ($retorno > 0 and $retorno != $_POST['id']) {
            mensagem(config_msg_duplicidade);
        } else {
            if ($mod->gravar_alterar($_POST['edt_usu_nome'], $_POST['edt_usu_permissao'], $_POST['id'])) {
                mensagem(config_msg_alterar);
            } else {
                mensagem(config_msg_erro);
            }
        }
        $mod->listar();
        require($dir . 'usuario_list.php');
        break;
}//final do switch
?>