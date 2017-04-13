<?php
  class conecta
{
    var $bd;
    
    function __construct(){
        $this->bd = ADONewConnection(config_banco);
        $this->bd->dialect = 3;
        $this->bd->debug = false;
        $this->bd->Connect(config_host, config_usuario, config_senha, config_nome);
    }
      
}




?>
