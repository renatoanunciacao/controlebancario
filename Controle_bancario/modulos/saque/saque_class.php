<?php

class saque{

    var $sql;
    var $res;
    var $reg;
    var $con;
    var $pagina;

    function __construct() {
        $this->con = new conecta();
    }

    function listar() {
        $this->sql = "Select * from saques";
        if (isset($_REQUEST['edt_busca']) != '') {
            $this->sql .= " WHERE  SAQ_CODIGO  LIKE ('%" . $_REQUEST['edt_busca'] . "%')";
        }
        $ordem = 'SAQ_CODIGO';
        if (isset($_GET['ord']) != '') {
            switch ($_GET['ord']) {
                case 1 :
                    $ordem = 'SAQ_CODIGO';
                    break;
                case 2 :
                    $ordem = 'SAQ_VALOR';
                    break;
            }
        }

        $this->sql .= " order by $ordem ASC";


        if (isset($_GET['pg']))
            $this->pagina = $_GET['pg'];
        else
            $this->pagina = 1;

        $this->res = $this->con->bd->PageExecute($this->sql, config_reg_pg, $this->pagina);
    }
    
     function verifica_conta($id) {
        $this->sql = "select COUNT(CONT_NUMERO) AS  TOTAL from contas where CONT_NUMERO = '$id' ";
        $res = $this->con->bd->Execute($this->sql);
        $reg = $res->FetchNextObject();
        if ($reg->TOTAL > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verifica_duplicidade($numero) {
        $this->sql = "Select * from saques where SAQ_CODIGO = '$numero'";
        $this->res = $this->con->bd->Execute($this->sql);
        if ($this->res->RecordCount() > 0) {
            $this->reg = $this->res->FetchNextObject();
            return $this->reg->SAQ_CODIGO;
        } else
            return 0;
    }

   function  gravar_sacar($valor, $conta){
      $this->sql = "insert  into saques (SAQ_VALOR, SAQ_DATA,CONT_NUMERO) VALUES ('$valor',current_timestamp, '$conta')";
       
         if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }

   }
    function verifica_integridade($id) {
        $this->sql = "Select * from contas where  CONT_CODIGO=$id";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    
    function total() {#contar a quantidade de itens que esta cadastrado
        $this->sql = "select * from saques ";
        if (isset($_REQUEST['edt_busca']) != '')
            $this->sql .= " WHERE  SAQ_VALOR  LIKE ('%" . $_REQUEST['edt_busca'] . "%')";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function paginacao() {
        $retorno = '';
        $x = 1;
        $t = ceil($this->total() / config_reg_pg);
        while ($x <= $t) {
            $retorno .= '[ <a href="?menu=saque&pg=' . $x;
            if (isset($_REQUEST['edt_busca']) != '')
                $retorno .= '&edt_busca=' . $_REQUEST['edt_busca'];
            if (isset($_GET['ord']) != '')
                $retorno .= '&ord=' . $_GET['ord'];
            $retorno .= ' ">' . $x . '</a> ]';
            $x++;
        }
        return $retorno;
    }
 
}



