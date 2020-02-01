<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar senha</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme -->
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        $chave = "";
        if($_GET["chave"]){
            $chave = preg_replace(' / | [ ^ [:alnum:]_.-@] /', '', $_GET["chave"]);
        
        ?>
        <form id="alterarsenha" action="confirma-nova-senha.php" method="POST">
            <input type="hidden" name="chave" value="<?php echo $chave; ?>"/>
            
            <h1>Alteração de senha</h1>
            <label>Email</label><br/>
            <input type="email" name="email"/><br/>
            <label>Nova senha</label></br>
            <input type="password" name="senha"/><br/>
            
            <button>Confirmar</button>
        </form>
        <?php
        }else {
            echo '<h1>Página não existe</h1>';
        }
        ?>
    </body>
</html>
