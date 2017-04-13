<?php

$dir = 'modulos/deposito/';
require($dir . 'deposito_class.php');
$mod = new deposito();
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
} else {
    $acao = 'listar';
}
switch ($acao) {
    case 'listar':
        $mod->listar();
        require($dir . 'deposito_list.php');
        break;
    case 'depositar' :
        require($dir . 'deposito_form.php');
        break;
    case 'gravar_depositar' :
        if ($mod->verifica_conta($_POST['edt_cont_numero']) > 0) {
                   mensagem(config_msg_verificaconta);
            if($mod->gravar_depositar($_POST['edt_dep_valor'], $_POST['edt_cont_numero'])){
                  mensagem(config_msg_deposito);   
                      
                
            }  
        else{
                   mensagem(config_msg_erro_deposito);  
              }
        }
         else{
                  mensagem(config_erro_conta);
        }
       
        $mod->listar();
        require ($dir . 'deposito_list.php');
        break;
}
//final do switch
?>