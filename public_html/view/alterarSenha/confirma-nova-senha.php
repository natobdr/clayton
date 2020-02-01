<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmação de nova senha</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme -->
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include_once 'Conexao_DB.php';
        $con = conexao_BD();
        
        $email = $_POST["email"];
        $novaSenha = $_POST["senha"];
        $chave = $_POST["chave"];
        
        $email = preg_replace(' / | [ ^ [:alnum:]_.-@] /', '', $email);
        $chave = preg_replace(' / | [ ^ [:alnum:]_.-@] /', '', $chave);
        $novaSenha = addslashes($novaSenha);
        
        $result = $con->validarChave($email, $chave);
        
        if($result){
            $alterarSenha = $con->setNovaSenha($novaSenha, $result);
            echo '<h1>Senha alterada com sucesso.</h1>';
        }else{
            echo '<h1>Usuário não existe.</h1>';
        }
        ?>
    </body>
</html>
