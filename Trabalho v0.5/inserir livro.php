    <!DOCTYPE html>
    <html language="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Novo Livro</title>
    </head>

    <body>
        <h1 align="center">Novo Livro</h1>
        <?php
            if(isset($_POST['criar_novo_livro'])){
            
            $extensao=strtolower(substr($_FILES['imagem']['name'],-4));
            $novo_nome=md5(time()).$extensao;
            $diretorio="upload/";

            move_uploaded_file($_FILES['imagem']['tmp_name'],$diretorio.$novo_nome);
            
                $ISBN_php=$_POST['ISBN'];
                
                $titulo_php=$_POST['titulo'];
                
                $autor_php=$_POST['autor'];
                
                $editora_php=$_POST['editora'];
                    
                $ano_php=$_POST['ano'];
                    
                $sinopse_php=$_POST['sinopse'];
                    
                $obs_php=$_POST['obs'];

                $sql = "INSERT into tb_livros 
                (isbn,titulo,autor,editora,ano,sinopse,obs,nome_imagem,data) 
                values (?,?,?,?,?,?,?,?,?)";
                include "conexao.php";
                $livro= $conn -> prepare($sql);
                $livro -> execute(array($ISBN_php,$titulo_php,$autor_php,$editora_php,$ano_php,$sinopse_php,$obs_php,$novo_nome,date("Y-m-d H:i:s")));
                unset($conn);
                echo "<script> alert('Livro Adicionado') 
                window.location.href='1-Biblioteca Online.php'</script>";
                    
            }
            ?>
        <style>
        body {
            color: white;
            background-color: #36393F;
        }
        </style>
        <center>
            <form method="post" enctype="multipart/form-data">
                ISBN<br>
                <input type=text maxlength=20 name="ISBN" placeholder="Insira o ISBN Aqui" autofocus>
                <br><br>

                Título <br>
                <input type=text maxlength=150 name="titulo" placeholder="Insira o Título Aqui">
                <br><br>

                Autor(a) <br>
                <input type=text maxlength=150 name="autor" placeholder="Insira o autor(a) Aqui">
                <br><br>

                Editora <br>
                <input type=text maxlength=100 name="editora" placeholder="Insira a Editora Aqui">
                <br><br>

                Ano <br>
                <input type=number max=2022 name="ano" placeholder="Insira o Ano de Lançamento Aqui">
                <br><br>

                Sinopse<br>
                <textarea name="sinopse" maxlength=200 placeholder="Insira a Sinopse Aqui"></textarea>
                <br><br>

                Observações<br>
                <textarea name="obs" maxlength=200 placeholder="Insira Observações Aqui"></textarea>
                <br><br>

                Capa<br>
                <input type="file" name="imagem">
                <br><br>

                <input type=submit value="Criar Novo Livro" name=criar_novo_livro>
                <br><br><br>
            </form>
        </center>
        <?php include "voltar ao menu principal.php"?>
    </body>

    </html>