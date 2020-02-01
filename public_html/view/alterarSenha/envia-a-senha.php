<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       include_once 'Conexao_BD.php';
       $con = conexao_BD();
       
       $email = preg_replace(' / | [ ^ [:alnum:]_.-@] /', '', $email);
       
       $chave = $con->geraChaveAcesso($email);
       
       if($chave) {
               echo '<a href="http://localhost/autoControl/login/alterar-senha.php?chave=">'
           . 'http://localhost/autoControl/login/alterar-senha.php?chave='. $chave.'"<h1/>';
       }
       else{
           echo '<h1>Usuário não cadastrado</h1>';
       }
        ?>
    </body>
</html>
