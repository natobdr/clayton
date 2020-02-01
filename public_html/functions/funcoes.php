<?php
/* Função para múltiplos explode*/
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

/* Função para validar CPF*/
function validarCPF( $cpf = '' ) {
    $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
    // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return FALSE;
    } else { // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                            $d += $cpf{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf{$c} != $d) {
                            return FALSE;
                    }
            }
            return TRUE;
    }
}

/* Função Anti SQL Injection */
function RemoveSQLInjection($str) {

    $caracteres = array("=", "'", " or ", " and ", " OR ", " AND ", " NOT IN ", " not in ", " not ", " NOT ", "(", ")", "-shutdown", "-SHUTDOWN", "--", "#", "$", "%", "¨", "&", "'or'1'='1'", "'OR'1'='1'", "1=1", "insert", "update", "INSERT", "UPDATE", "drop", "DROP", "delete", "delet", "DELETE", "DELET", "WHERE" ,"where", "join", "JOIN", "LEFT", "left", "INNER", "inner", "RIGHT", "right", "like", "LIKE", "truncate", "TRUNCATE", "CREATE", "create", "delimiter", "DELIMITER", "from", "FROM", "select", "SELECT", "XP_", "*", ":", ";", "//", "\\");
    $str =  str_replace($caracteres, "", $str);	  
    return $str;

}
