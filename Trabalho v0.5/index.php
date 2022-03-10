<!DOCTYPE html>
<html language="pt-br">
<link rel="stylesheet" href="css/login.css">

<head>
    <meta charset="UTF-8">
    <title>Logar</title>
</head>

<body>
    <?php
	    if(isset($_POST['logar'])){

            $usuario_php=$_POST['email'];
            
            $senha_php=md5($_POST['senha']);

            $sql = "
                SELECT * FROM tb_usuarios 
                WHERE 
                (email='$usuario_php' or nome='$usuario_php') 
                AND
                senha='$senha_php'";
            include "conexao.php";
            $login= $conn -> prepare($sql);
            $login -> execute();
            $conn=null;
            $existe=$login->rowCount();
            if ($existe==1){
                foreach($login as $l){
                    $nome =$l['nome'];
                    $perfil=$l['perfil'];
                }
                session_start();
                $_SESSION['login']="logado";
                $_SESSION['username']=$nome;
                $_SESSION['perfil']=$perfil;
                header("Location: 1-Biblioteca Online.php");
            }
            else{
                echo"<script>
                    alert('Usuário  ou senha nao conferem');
                </script>";
            }
        }
    ?>
    <center>
        <div class="div">

            <form method="post">
                <h1>Login</h1><br>
                <input type=text name="email" placeholder="Insira Seu E-mail Aqui" class="form_login" autofocus><br><br>

                <input type=password name="senha" placeholder="Insira Sua Senha Aqui" class="form_login">

                <br><br>
                <center><input type=submit value="Logar" name=logar class=login_button></center><br><br><br><br>
            </form>
            <a href="criar_conta.php">
                <center><input type=button value="Criar Conta" class="criar_conta"></center>
            </a>

        </div>
    </center>
    <?php include "voltar ao menu principal.php"?>


</body>

</html>