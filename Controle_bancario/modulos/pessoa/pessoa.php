<?php

$dir = 'modulos/pessoa/';
require($dir . 'pessoa_class.php');
$mod = new pessoa();
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
} else {
    $acao = 'listar';
}
switch ($acao) {
    case 'listar':
        $mod->listar();
        require($dir . 'pessoa_list.php');
        break;
    case 'incluir':

        require ($dir . 'pessoa_form.php');
        break;
    case 'gravar_incluir':
        if ($mod->verifica_duplicidade($_POST['edt_pes_tipo'], $_POST['edt_pes_email']) > 0) {
            mensagem(config_msg_duplicidade);
        } else {
            if ($mod->gravar_incluir($_POST['edt_pes_codigo'],$_POST['edt_pes_tipo'], $_POST['edt_pes_endereco'], $_POST['edt_pes_telefone'], $_POST['edt_pes_email'])) {
                mensagem(config_msg_incluir);
            } else {
                mensagem(config_msg_erro);
            }
        }
        $mod->listar();
        require ($dir . 'pessoa_list.php');
        break;
    case 'excluir':
        if ($mod->verifica_integridade($_GET['id']) > 0) {
            mensagem(config_msg_integridade);
        } else {
            if ($mod->excluir($_GET['id'])) {
                mensagem(config_msg_excluir);
            }
            else {
                mensagem(config_msg_erro);
            }
        }
           
    
        $mod->listar();
        require 'pessoa_list.php';
        break;
    case 'alterar' :
        $mod->alterar($_GET['id']);
        require($dir . 'pessoa_form.php');
        break;
    case 'gravar_alterar' :
        $retorno = $mod->verifica_duplicidade($_POST['edt_pes_tipo'], $_POST['edt_pes_email']);
        if ($retorno > 0 and $retorno != $_POST['id']) {
            mensagem(config_msg_duplicidade);
        } else {
            if ($mod->gravar_alterar($_POST['edt_pes_tipo'], $_POST['edt_pes_endereco'],$_POST['edt_pes_telefone'],$_POST['edt_pes_email'], $_POST['id'])) {
                mensagem(config_msg_alterar);
            } else {
                mensagem(config_msg_erro);
            }
        }
        $mod->listar();
        require($dir . 'pessoa_list.php');
        break;
}//final do switch
?>