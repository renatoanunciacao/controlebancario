<?php

class juridica {

    var $sql;
    var $res;
    var $reg;
    var $con;
    var $pagina;

    function __construct() {
        $this->con = new conecta();
    }

    function listar() {
        $this->sql = "Select * from juridicas";
        if (isset($_REQUEST['edt_busca']) != '') {
            $this->sql .= " WHERE  lower(JUR_NOME)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        }
        $ordem = 'JUR_NOME';
        if (isset($_GET['ord']) != '') {
            switch ($_GET['ord']) {
                case 1 :
                    $ordem = 'JUR_CODIGO';
                    break;
                case 2 :
                    $ordem = 'JUR_NOME';
                    break;
                case 3 :
                    $ordem = 'JUR_UF';
                    break;
                case 4 :
                    $ordem = 'JUR_ENDERECO';
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

    function verifica_duplicidade($nome,$cnpj) {
        $this->sql = "Select * from juridicas where lower(JUR_NOME) = lower('$nome') and JUR_CNPJ =  '$cnpj' ";
        $this->res = $this->con->bd->Execute($this->sql);
        if ($this->res->RecordCount() > 0) {
            $this->reg = $this->res->FetchNextObject();
            return $this->reg->JUR_CODIGO;
        } else
            return 0;
    }

    function gravar_incluir($nome, $cnpj,$pessoa) {
        $this->sql = "insert into juridicas(JUR_CODIGO,JUR_NOME, JUR_CNPJ, PES_CODIGO) values (default, '$nome','$cnpj','$pessoa')";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    function alterar($id) {
        $this->sql = "Select * from juridicas where JUR_CODIGO = $id";
        $this->res = $this->con->bd->Execute($this->sql);
        $this->reg = $this->res->FetchNextObject();
    }

    function gravar_alterar($nome, $cnpj, $id) {
        $this->sql = "update juridicas set JUR_NOME = '$nome', JUR_CNPJ = '$cnpj' where JUR_CODIGO = $id";
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
        $this->sql = "delete from juridicas where JUR_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    
    function total() {#contar a quantidade de itens que esta cadastrado
        $this->sql = "select * from juridicas ";
        if (isset($_REQUEST['edt_busca']) != '')
            $this->sql .= " WHERE  lower(JUR_NOME)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function paginacao() {
        $retorno = '';
        $x = 1;
        $t = ceil($this->total() / config_reg_pg);
        while ($x <= $t) {
            $retorno .= '[ <a href="?menu=juridica&pg=' . $x;
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

