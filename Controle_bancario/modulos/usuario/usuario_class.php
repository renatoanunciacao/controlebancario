<?php

class usuario {

    var $sql;
    var $res;
    var $reg;
    var $con;
    var $pagina;

    function __construct() {
        $this->con = new conecta();
    }

    function listar() {
        $this->sql = "Select * from tblusuario ";
        if (isset($_REQUEST['edt_busca']) != '') {
            $this->sql .= " WHERE  lower(USU_NOME)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        }
        $ordem = 'USU_NOME';
        if (isset($_GET['ord']) != '') {
            switch ($_GET['ord']) {
                case 1 :
                    $ordem = 'USU_CODIGO';
                    break;
                case 2 :
                    $ordem = 'USU_NOME';
                    break;
                case 3 :
                    $ordem = 'USU_PERMISSAO';
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

    function verifica_duplicidade($login,$permissao) {
        $this->sql = "Select * from tblusuario where lower(USU_LOGIN) = lower('$login') and USU_PERMISSAO = '$permissao' ";
        $this->res = $this->con->bd->Execute($this->sql);
        if ($this->res->RecordCount() > 0) {
            $this->reg = $this->res->FetchNextObject();
            return $this->reg->USU_CODIGO;
        } else
            return 0;
    }

    function gravar_incluir($nome, $login,$senha, $permissao) {
        $this->sql = "insert into tblusuario(USU_NOME,USU_LOGIN, USU_SENHA, USU_PERMISSAO) values ('$nome','$login',md5('$senha'),'$permissao')";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    function alterar($id) {
        $this->sql = "Select * from tblusuario where USU_CODIGO = $id";
        $this->res = $this->con->bd->Execute($this->sql);
        $this->reg = $this->res->FetchNextObject();
    }

    function gravar_alterar($nome, $permissao, $id) {
        $this->sql = "update tblusuario set USU_NOME = '$nome', USU_PERMISSAO = '$permissao' where USU_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

   
    function excluir($id) {
        $this->sql = "delete from tblusuario where USU_CODIGO = $id";
        if ($this->con->bd->Execute($this->sql)) {
            return true;
        } else {
            return false;
        }
    }

    function lista_permissao($op) {
        $permissoes = array('1' => '1', '2' => '2', '3' => '3');
        asort($permissoes);
        $lista = ' ';
        foreach ($permissoes as $k => $v) {
            $sel = ' ';
            if ($k == $this->reg->USU_PERMISSAO)
                $sel = "selected";
            $lista .='<option value="' . $k . ' "' . $sel . '>' . $v . '</option>';
        }
        return $lista;
    }

    function total() {#contar a quantidade de itens que esta cadastrado
        $this->sql = "select * from tblusuario ";
        if (isset($_REQUEST['edt_busca']) != '')
            $this->sql .= " WHERE  lower(USU_NOME)  LIKE lower('%" . $_REQUEST['edt_busca'] . "%')";
        $this->res = $this->con->bd->Execute($this->sql);
        return $this->res->RecordCount();
    }

    function paginacao() {
        $retorno = '';
        $x = 1;
        $t = ceil($this->total() / config_reg_pg);
        while ($x <= $t) {
            $retorno .= '[ <a href="?menu=usuario&pg=' . $x;
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

