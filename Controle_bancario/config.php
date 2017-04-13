<?php

/* Arquivo de configuração onde serão criadas as constantes utilizadas no sistema */

define('config_banco', 'postgres');
define('config_nome', 'Banco');
define('config_usuario', 'postgres');
define('config_senha', 'armagedom');
define('config_host', 'localhost');



define('config_msg_incluir','Registro incluido com sucesso');
define('config_msg_erro', 'ERRO!Registro não efetuado!');
define('config_msg_alterar', 'Registro alterado com sucesso!');
define('config_msg_excluir', 'Registro excluído com sucesso!');
define('config_msg_integridade', 'ERRO!Este registro não pode ser  excluído.\nPois existem dados agregados a ele.');
define('config_msg_duplicidade', 'ERRO!Este campo ja existe!');
define('config_msg_verificaconta', 'Entrou na sua conta com sucesso');
define('config_erro_conta','ERRO!Esta conta não existe');
define('config_sem_saldo','Saldo insuficiente');
define('config_msg_deposito','Depósito efetuado com sucesso');
define('config_msg_erro_deposito','Erro!Depósito não pode ser efetuado');
define('config_msg_saque','Saque efetuado com sucesso');

define ('config_reg_pg', 7);
define('config_img_tamanho',1000000);
?>
   

<?php
