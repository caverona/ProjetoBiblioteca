<!DOCTYPE html>
<html language="pt-br">
<!--Não está completo, fiz só por diversão-->
<link rel="stylesheet" href="css/login.css">

<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
</head>

<body>
    <?php
    session_start();
    session_destroy();
	    if(isset($_POST['cadastrar'])){
            
            $nome_php=$_POST['nome'];
            
            $email_php=$_POST['email'];
            
            $senha_php=md5($_POST['senha']);

            $perfil_php=$_POST['perfil'];

            $sql = "INSERT into tb_usuarios 
            (nome,email,senha,perfil) 
            values (?,?,?,?)";
            include "conexao.php";
            $usuario= $conn -> prepare($sql);
            $usuario -> execute(array($nome_php,$email_php,$senha_php,$perfil_php));
            $conn=null;
            echo "<script> alert('Conta criada') 
            window.location.href='index.php'</script>";
        }
    ?>

    <style>
    body {
        background-color: #36393F;
    }
    </style>
    <center>
        <div class="div">
            <h1>Criar Conta</h1><br>
            <form method="post"> <br>
                <input type=text name="nome" placeholder="Insira Seu Nome Aqui" class="form_login" autofocus><br><br>
                <input type=text name="email" placeholder="Insira Seu email Aqui" class="form_login"><br><br>
                <input type=password name="senha" placeholder="Insira Sua Senha Aqui" class="form_login"><br><br>
                <select name="perfil" class=select><br>
                    <option value="0">Leitor</option>
                    <option value="1">Colaborador</option>
                    <option value="2">Administrador</option>
                </select>

                <br><br><input type=submit value="Cadastrar" name=cadastrar class=login_button><br><br><br><br>
            </form>
        </div>
    </center>
    <?php include "voltar ao menu principal.php"?>


</body>

</html>