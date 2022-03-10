<!DOCTYPE html>
<html language="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>

<body>

    <?php
        $codigo = $_GET['codigo'];
        $titulo = $_GET['titulo'];
        $sql="select * from tb_livros where id_livros ='$codigo'";
        include "conexao.php";
        $livro = $conn -> prepare($sql);
        $livro -> execute();
        $conn=null;
            foreach($livro as $s){
                $isbn=$s['isbn'];
                $titulo=$s['titulo'];
                $autor=$s['autor'];
                $editora=$s['editora'];
                $ano=$s['ano'];
                $sinopse=$s['sinopse'];
                $obs=$s['obs'];
                $novo_nome=$s['nome_imagem'];
                $data=$s['data'];
            }
                 
            if(isset($_POST['salvar'])){
                if($_FILES['imagem']['name']!=""){
                    $extensao=strtolower(substr($_FILES['imagem']['name'],-4));
                    $novo_nome=md5(time()).$extensao;
                    $diretorio="upload/";
        
                    move_uploaded_file($_FILES['imagem']['tmp_name'],$diretorio.$novo_nome);
                    $data=date("Y-m-d H:i:s");
                }
                
                $codigo_php=$_POST['codigo'];

                $ISBN_php=$_POST['ISBN'];
                    
                $titulo_php=$_POST['titulo'];
                    
                $autor_php=$_POST['autor'];
                    
                $editora_php=$_POST['editora'];
                    
                $ano_php=$_POST['ano'];
                    
                $sinopse_php=$_POST['sinopse'];
                    
                $obs_php=$_POST['obs'];

                    $sql =  "UPDATE tb_livros set 
                    id_livros=?,
                    isbn=?,
                    titulo=?,
                    autor=?,
                    editora=?,
                    ano=?,
                    sinopse=?,
                    obs=?,
                    nome_imagem=?,
                    data=?
                    where 
                    id_livros=?
                    ";
                    include 'conexao.php';
                    $livro= $conn -> prepare($sql);
                    $livro -> execute(array($codigo_php,$ISBN_php,$titulo_php,$autor_php,$editora_php,$ano_php,$sinopse_php,$obs_php,$novo_nome,$data,$codigo));
                    $conn=null;

                    echo "<script> alert('Livro Salvo')
                    window.location.href='1-Biblioteca Online.php' </script>";
                    
            }
            ?>
    <hr>
    <h1 align="center">Editar <?php echo "$titulo";?></h1>
    <hr>
    <style>
    body {
        color: white;
        background-color: #36393F;
    }
    </style>
    <center>
        <form method="post" enctype="multipart/form-data">
            Código <br>
            <input type=text maxlength=20 name="codigo" placeholder="Insira o Código Aqui" autofocus
                value="<?php echo "$codigo";?>">
            <br><br>

            ISBN<br>
            <input type=text maxlength=20 name="ISBN" placeholder="Insira o ISBN Aqui" value="<?php echo "$isbn";?>">
            <br><br>

            Título <br>
            <input type=text maxlength=150 name="titulo" placeholder="Insira o Título Aqui"
                value="<?php echo "$titulo";?>">
            <br><br>

            Autor(a) <br>
            <input type=text maxlength=150 name="autor" placeholder="Insira o autor(a) Aqui"
                value="<?php echo "$autor";?>">
            <br><br>

            Editora <br>
            <input type=text maxlength=100 name="editora" placeholder="Insira a Editora Aqui"
                value="<?php echo "$editora";?>">
            <br><br>

            Ano <br>
            <input type=number max=2022 name="ano" placeholder="Insira o Ano de Lançamento Aqui"
                value="<?php echo "$ano";?>">
            <br><br>

            Sinopse<br>
            <textarea name="sinopse" placeholder="Insira a Sinopse Aqui"><?php echo "$sinopse";?></textarea>
            <br><br>

            Observações<br>
            <textarea name="obs" placeholder="Insira Observações Aqui"><?php echo "$obs";?></textarea>
            <br><br>

            Capa<br>
            <input type="file" name="imagem">
            <br><br>

            <br><br>
            <input type=submit value="Salvar" name=salvar>
            <input type="button" value="Não" onclick="window.history.back()">
        </form>
    </center>
</body>

</html>