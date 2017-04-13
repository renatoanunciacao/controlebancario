<?php

$dir = 'modulos/saque/';
require($dir . 'saque_class.php');
$mod = new saque();
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
} else {
    $acao = 'listar';
}
switch ($acao) {
    case 'listar':
        $mod->listar();
        require($dir . 'saque_list.php');
        break;
    case 'sacar':
        require ($dir . 'saque_form.php');
        break;
  case 'gravar_sacar':
    if ($mod->verifica_conta($_POST['edt_cont_numero']) > 0) {
                   mensagem(config_msg_verificaconta);
            if($mod->gravar_sacar($_POST['edt_saq_valor'], $_POST['edt_cont_numero'])){ 
                             mensagem(config_msg_saque);
            }  
        else{
                          mensagem(config_sem_saldo);
              }
        }
        else{
            mensagem(config_erro_conta);
        }
        $mod->listar();
        require ($dir . 'saque_list.php');
       break;

}//final do switch
?>