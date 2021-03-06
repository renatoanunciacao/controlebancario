<?php

class pessoa {

    var $sql;
    var $res;
    var $reg;
    var $con;
    var $pagina;

    function __construct() {
        $this->con = new conecta();
    }

    function listar() {
        $this->sql = "Select * from pessoas";
        if (isset($_REQUEST['edt_busca']) != '') {
            $this->sql .= " WHERE  lower(PES_EMAIL)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        }
        $ordem = 'PES_EMAIL';
        if (isset($_GET['ord']) != '') {
            switch ($_GET['ord']) {
                case 1 :
                    $ordem = 'PES_CODIGO';
                    break;
                case 2 :
                    $ordem = 'PES_TIPO';
                    break;
                case 3 :
                    $ordem = 'PES_ENDERECO';
                    break;
                case 4 :
                    $ordem = 'PES_TELEFONE';
                    break;
                case 5 :
                    $ordem = 'PES_EMAIL';
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

    function verifica_duplicidade($tipo, $email) {
        $this->sql = "Select * from pessoas where lower(PES_TIPO) = lower('$tipo') and lower(PES_EMAIL) =  '$email' ";
        $this->res = $this->con->bd->Execute($this->sql);
        if ($this->res->RecordCount() > 0) {
            $this->reg = $this->res->FetchNextObject();
            return $this->reg->PES_CODIGO;
        } else
            return 0;
    }

    function gravar_incluir($cod,$tipo, $endereco, $telefone, $email) {
        $this->sql = "insert into pessoas(PES_CODIGO,PES_TIPO, PES_ENDERECO,PES_TELEFONE, PES_EMAIL) values ('$cod','$tipo','$endereco', '$telefone', '$email')";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    function alterar($id) {
        $this->sql = "Select * from pessoas where PES_CODIGO = $id";
        $this->res = $this->con->bd->Execute($this->sql);
        $this->reg = $this->res->FetchNextObject();
    }

    function gravar_alterar($tipo, $endereco, $telefone, $email, $id) {

        $this->sql = "update pessoas set  PES_TIPO = '$tipo', PES_ENDERECO = '$endereco', PES_TELEFONE= '$telefone', PES_EMAIL = '$email' where PES_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    function verifica_integridade($id) {
        $this->sql = "Select * from contas where  PES_CODIGO=$id";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function excluir($id) {
        $this->sql = "delete from pessoas where PES_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    
    function total() {#contar a quantidade de itens que esta cadastrado
        $this->sql = "select * from pessoas ";
        if (isset($_REQUEST['edt_busca']) != '')
            $this->sql .= " WHERE  lower(PES_TIPO)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function paginacao() {
        $retorno = '';
        $x = 1;
        $t = ceil($this->total() / config_reg_pg);
        while ($x <= $t) {
            $retorno .= '[ <a href="?menu=pessoa&pg=' . $x;
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
?>

