<?php

function mensagem($texto)
{
    echo '<script>';
    
    echo 'alert(" '.$texto.' ")';
    echo '</script>';
}

function redireciona($url)
{
   echo ' <script>';
   echo 'window.location=" '.$url.' " ';
   echo '</script>';
}

function limpa_caracteres($string)
{
    $c = array('=','and','or','@','xor','#','.',';','//');
   foreach($c as $v)
   {
       $string = str_replace($v, '', $string);
       
   }
   return $string;
}
function inverte_data($data, $atual, $novo)
{
    $dt = explode($atual, $data);
    
    return $dt[2].$novo.$dt[1].$novo.$dt[0];
    
    
            
}

?>