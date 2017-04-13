<?php

$dir = 'modulos/juridica/';
require($dir . 'juridica_class.php');
$mod = new juridica();
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
} else {
    $acao = 'listar';
}
switch ($acao) {
    case 'listar':
        $mod->listar();
        require($dir . 'juridica_list.php');
        break;
    case 'incluir':

        require ($dir . 'juridica_form.php');
        break;
    case 'gravar_incluir':
        if ($mod->verifica_duplicidade($_POST['edt_jur_nome'], $_POST['edt_jur_cnpj']) > 0) {
            mensagem(config_msg_duplicidade);
        } else {
            if ($mod->gravar_incluir($_POST['edt_jur_nome'], $_POST['edt_jur_cnpj'], $_POST['edt_pes_codigo'])) {
                mensagem(config_msg_incluir);
            } else {
                mensagem(config_msg_erro);
            }
        }
        $mod->listar();
        require ($dir . 'juridica_list.php');
        break;
    case 'excluir':
        if ($mod->verifica_integridade($_GET['id']) > 0) {
            mensagem(config_msg_integridade);
        } else {
            if ($mod->excluir($_GET['id'])) {
                mensagem(config_msg_excluir);
            } 
        }      
    
        $mod->listar();
        require 'juridica_list.php';
        break;
    case 'alterar' :
        $mod->alterar($_GET['id']);
        require($dir . 'juridica_form.php');
        break;
    case 'gravar_alterar' :
        $retorno = $mod->verifica_duplicidade($_POST['edt_jur_nome'], $_POST['edt_jur_cnpj'], $_POST['id']);
        if ($retorno > 0 and $retorno != $_POST['id']) {
            mensagem(config_msg_duplicidade);
        } else {
            if ($mod->gravar_alterar($_POST['edt_jur_nome'], $_POST['edt_jur_cnpj'], $_POST['id'])) {
                mensagem(config_msg_alterar);
            } else {
                mensagem(config_msg_erro);
            }
        }
        $mod->listar();
        require($dir . 'juridica_list.php');
        break;
}//final do switch
?>