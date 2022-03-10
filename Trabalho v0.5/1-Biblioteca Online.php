<!DOCTYPE html>
<?php 
include "buttons_livros.php"
?>

<html language="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Livros</title>
</head>

<body>
    <style>
    body {
        color: white;
        background-color: #36393F;
    }
    </style>
    <h1 align="center">Livros - Cadastrados</h1>
    <?php include "menu.php"?>

    <center>
        <table border="3">
            <tr>
                <form method=post>
                    <th><input type=submit value="Código" name=codigo_button> </th>

                    <th><input type=submit value="ISBN" name=isbn_button> </th>

                    <th><input type=submit value="Título" name=titulo_button> </th>

                    <th><input type=submit value="Autor(a)" name=autor_button> </th>

                    <th><input type=submit value="Editora" name=editora_button> </th>

                    <th><input type=submit value="Ano" name=ano_button> </th>
                    <?php if ($_SESSION['perfil']>0)
                       echo "<th>Operações</th>"
                        
                    ?>
                    <!--<th>Número de emprestimos</th>-->
                </form>
            </tr>
            <?php
					foreach($livros as $s){
						$codigo = $s['id_livros'];
						$isbn = $s['isbn'];
						$titulo = $s['titulo'];
						$autor = $s['autor'];
						$editora = $s['editora'];
						$ano = $s['ano'];
						$obs = $s['obs'];
                        $emprestar="<a href='livro_emprestar.php?codigo=$codigo&titulo=$titulo'title='Emprestar'><img src='emprestar.png'width='25'></a>";
                        $editar = "<a href='livro_editar.php?codigo=$codigo&titulo=$titulo' title='Editar'><img src='editar.png'width='25'></a>";
					    $excluir = "<a href='livro_excluir.php?codigo=$codigo&titulo=$titulo'title='Excluir'><img src='excluir.png'width='25'></a>";
						
						echo"<tr>";
						echo"<td>",$codigo;
						echo"<td>",$isbn;
						echo"<td>",$titulo;
						echo"<td>",$autor;
						echo"<td>",$editora;
						echo"<td>",$ano;
                        if ($_SESSION['perfil']>0){
						echo"<td><center>",$emprestar," ",$editar,"   ",$excluir,"<center>";
                        }
						echo"</tr>";
					}
			?>
            <br>
        </table>
    </center>

</body>

</html>