<?php

class fisica {

    var $sql;
    var $res;
    var $reg;
    var $con;
    var $pagina;

    function __construct() {
        $this->con = new conecta();
    }

    function listar() {
        $this->sql = "Select * from fisicas";
        if (isset($_REQUEST['edt_busca']) != '') {
            $this->sql .= " WHERE  lower(FIS_NOME)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        }
        $ordem = 'FIS_NOME';
        if (isset($_GET['ord']) != '') {
            switch ($_GET['ord']) {
                case 1 :
                    $ordem = 'FIS_CODIGO';
                    break;
                case 2 :
                    $ordem = 'FIS_NOME';
                    break;
                case 3 :
                    $ordem = 'FIS_CPF';
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

    function verifica_duplicidade($nome,$cpf) {
        $this->sql = "Select * from fisicas where lower(FIS_NOME) = lower('$nome') and FIS_CPF =  '$cpf' ";
        $this->res = $this->con->bd->Execute($this->sql);
        if ($this->res->RecordCount() > 0) {
            $this->reg = $this->res->FetchNextObject();
            return $this->reg->FIS_CODIGO;
        } else
            return 0;
    }

    function gravar_incluir($nome, $cpf,$pessoa) {
        $this->sql = "insert into fisicas(FIS_CODIGO, FIS_NOME, FIS_CPF, PES_CODIGO) values (default, '$nome','$cpf','$pessoa')";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    function alterar($id) {
        $this->sql = "Select * from fisicas where FIS_CODIGO = $id";
        $this->res = $this->con->bd->Execute($this->sql);
        $this->reg = $this->res->FetchNextObject();
    }

    function gravar_alterar($nome, $cpf, $id) {
        $this->sql = "update fisicas set FIS_NOME = '$nome', FIS_CPF = '$cpf' where FIS_CODIGO = $id";
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
        $this->sql = "delete from fisicas where FIS_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    
    function total() {#contar a quantidade de itens que esta cadastrado
        $this->sql = "select * from fisicas ";
        if (isset($_REQUEST['edt_busca']) != '')
            $this->sql .= " WHERE  lower(FIS_NOME)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function paginacao() {
        $retorno = '';
        $x = 1;
        $t = ceil($this->total() / config_reg_pg);
        while ($x <= $t) {
            $retorno .= '[ <a href="?menu=fisica&pg=' . $x;
            if (isset($_REQUEST['edt_busca']) != '')
                $retorno .= '&edt_busca=' . $_REQUEST['edt_busca'];
            if (isset($_GET['ord']) != '')
                $retorno .= '&ord=' . $_GET['ord'];
            $retorno .= ' ">' . $x . '</a> ]';
            $x++;
        }
        return $retorno;
    }
    
    
    function lista_pessoa() {
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
    
    
    function lista_codigo(){
        $sql = "select * from pessoas order by PES_CODIGO";
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
        

}
?>

