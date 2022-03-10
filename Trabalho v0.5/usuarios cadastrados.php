<!DOCTYPE html>
<?php include "buttons_usuarios.php"?>

<html language="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
</head>

<body>
    <style>
    body {
        color: white;
        background-color: #36393F;
    }
    </style>
    <h1 align="center">Usuários - Cadastrados</h1>

    <?php include "menu.php"?>

    <center>
        <table border="3">
            <tr>
                <form method=post>
                    <th><input type=submit value="Código" name=codigo_button title="Código"> </th>

                    <th><input type=submit value="Nome" name=nome_button title="ISBN"> </th>

                    <th><input type=submit value="E-mail" name=email_button> </th>

                    <th><input type=submit value="Senha" name=senha_button> </th>

                    <?php if ($_SESSION['perfil']>1)
                    echo "<th>Operações</th>"
                    ?>
                    <!--<th>Número de emprestimos</th>-->
                </form>
            </tr>
            <?php
					foreach($usuario as $s){
						$codigo = $s['id_usuarios'];
						$nome = $s['nome'];
						$email = $s['email'];
						$senha = $s['senha'];
                        
						$editar = "<a href='usuario_editar.php?codigo=$codigo&nome=$nome'><img src='editar.png'width='25'></a>";
						$excluir = "<a href='usuario_excluir.php?codigo=$codigo&nome=$nome'><img src='excluir.png'width='25'></a>";
                        
						echo"<tr>";
						echo"<td>",$codigo;
						echo"<td>",$nome;
						echo"<td>",$email;
						echo"<td>",$senha;;
                        if ($_SESSION['perfil']>1){
						echo"<td><center>",$editar,"   ",$excluir,"<center>";
                        }
						echo"</tr>";

					}
			?>
        </table>
    </center>

</body>

</html>