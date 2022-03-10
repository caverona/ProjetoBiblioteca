<!DOCTYPE html>
<html language="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>

<body>

    <?php
        $codigo = $_GET['codigo'];
        $nome = $_GET['nome'];
        $sql="select * from tb_usuarios where id_usuarios ='$codigo'";
        include "conexao.php";
        $usuario = $conn -> prepare($sql);
        $usuario -> execute();
        $conn=null;
            foreach($usuario as $s){
                $nome=$s['nome'];
                $email=$s['email'];
                $senha=$s['senha'];
            }
                 
            if(isset($_POST['salvar'])){
                
                $codigo_php=$_POST['codigo'];

                $nome_php=$_POST['nome'];
                    
                $email_php=$_POST['email'];
                    
                $senha_php=$_POST['senha'];
                
                    $sql =  "UPDATE tb_usuarios set 
                    id_usuarios=?,
                    nome=?,
                    email=?,
                    senha=?
                    where 
                    id_usuarios=?
                    ";
                    include 'conexao.php';
                    $livro= $conn -> prepare($sql);
                    $livro -> execute(array($codigo_php,$nome_php,$email_php,$senha_php,$codigo));
                    $conn=null;

                    echo "<script> alert('Perfil Salvo')
                    window.location.href='usuarios cadastrados.php' </script>";
                    
            }
            ?>
    <hr>
    <h1 align="center">Editar <?php echo "$nome";?></h1>
    <hr>
    <style>
    body {
        color: white;
        background-color: #36393F;
    }
    </style>
    <center>
        <form method="post">
            Código <br>
            <input type=text maxlength=20 name="codigo" placeholder="Insira o Código Aqui" autofocus
                value="<?php echo "$codigo";?>">
            <br><br>

            Nome<br>
            <input type=text maxlength=20 name="nome" placeholder="Insira o Nome Aqui" value="<?php echo "$nome";?>">
            <br><br>

            E-mail <br>
            <input type=text maxlength=150 name="email" placeholder="Insira o E-mail Aqui"
                value="<?php echo "$email";?>">
            <br><br>

            Senha <br>
            <input type=text maxlength=32 name="senha" placeholder="Insira a Senha Aqui" value="<?php echo "$senha";?>">
            <br><br>

            <br><br>
            <input type=submit value="Salvar" name=salvar>
            <input type="button" value="Não" onclick="window.history.back()">
        </form>
    </center>
</body>

</html>