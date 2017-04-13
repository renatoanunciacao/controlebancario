<?php

class conta{

    var $sql;
    var $res;
    var $reg;
    var $con;
    var $pagina;

    function __construct() {
        $this->con = new conecta();
    }

    function listar() {
        $this->sql = "Select * from contas";
        if (isset($_REQUEST['edt_busca']) != '') {
            $this->sql .= " WHERE  lower(CONT_CODIGO)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        }
        $ordem = 'CONT_CODIGO';
        if (isset($_GET['ord']) != '') {
            switch ($_GET['ord']) {
                case 1 :
                    $ordem = 'CONT_CODIGO';
                    break;
                case 2 :
                    $ordem = 'CONT_NUMERO';
                    break;
                case 3 :
                    $ordem = 'CONT_VALOR_TOTAL';
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

    function verifica_duplicidade($numero) {
        $this->sql = "Select * from contas where CONT_NUMERO = '$numero' ";
        $this->res = $this->con->bd->Execute($this->sql);
        if ($this->res->RecordCount() > 0) {
            $this->reg = $this->res->FetchNextObject();
            return $this->reg->CONT_CODIGO;
        } else
            return 0;
    }

    function gravar_incluir($numero, $pessoa) {
        $this->sql = "insert into contas(CONT_NUMERO, CONT_VALOR_TOTAL, PES_CODIGO) values ('$numero',0.00, '$pessoa')";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }


    function verifica_integridade($id) {
        $this->sql = "Select * from pessoas where  PES_CODIGO=$id";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function excluir($id) {
        $this->sql = "delete from contas where CONT_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    
    function total() {#contar a quantidade de itens que esta cadastrado
        $this->sql = "select * from contas ";
        if (isset($_REQUEST['edt_busca']) != '')
            $this->sql .= " WHERE  lower(CONT_NUMERO)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function paginacao() {
        $retorno = '';
        $x = 1;
        $t = ceil($this->total() / config_reg_pg);
        while ($x <= $t) {
            $retorno .= '[ <a href="?menu=conta&pg=' . $x;
            if (isset($_REQUEST['edt_busca']) != '')
                $retorno .= '&edt_busca=' . $_REQUEST['edt_busca'];
            if (isset($_GET['ord']) != '')
                $retorno .= '&ord=' . $_GET['ord'];
            $retorno .= ' ">' . $x . '</a> ]';
            $x++;
        }
        return $retorno;
    }
    
    
    
    function lista_tipo(){
        $sql = "select * from pessoas order by PES_TIPO";
        $res = $this->con->bd->Execute($sql);
        $lista = ' ';
        while ($reg = $res->FetchNextObject()) {
            $sel = ' ';
            if ($reg->PES_CODIGO == $this->reg->PES_CODIGO)
                $sel = "selected";
            $lista .='<option value="' . $reg->PES_CODIGO . ' "' . $sel . '>' . $reg->PES_TIPO . '</option>';
        }
        return $lista;
    }

                
        function lista_codigo(){
        $sql = "select * from pessoas order by PES_TIPO";
        $res = $this->con->bd->Execute($sql);
        $lista = ' ';
        while ($reg = $res->FetchNextObject()) {
            $sel = ' ';
            if ($reg->PES_CODIGO == $this->reg->PES_CODIGO)
                $sel = "selected";
            $lista .='<option value="' . $reg->PES_CODIGO . ' "' . $sel . '>' . $reg->PES_CODIGO . '</option>';
        }
        return $lista;
    }


   
 
 
  function lista_email() {
        $sql = "select * from pessoas order by PES_EMAIL";
        $res = $this->con->bd->Execute($sql);
        $lista = ' ';
        while ($reg = $res->FetchNextObject()) {
            $sel = ' ';
            if ($reg->PES_CODIGO == $this->reg->PES_CODIGO)
                $sel = "selected";
            $lista .='<option value="' . $reg->PES_CODIGO . ' "' . $sel . '>' . $reg->PES_EMAIL . '</option>';
        }
        return $lista;
    }
 
}

?>

