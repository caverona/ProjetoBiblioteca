<!DOCTYPE html>
<html language="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Emprestar</title>
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
                $capa=$s['nome_imagem'];
                $isbn=$s['isbn'];
                $titulo=$s['titulo'];
                $autor=$s['autor'];
                $editora=$s['editora'];
                $ano=$s['ano'];
                $sinopse=$s['sinopse'];
                $obs=$s['obs'];
            }
            ?>
    <hr>
    <h1 align="center">Emprestar <?php echo "$titulo";?></h1>
    <hr>
    <style>
    body {
        color: white;
        background-color: #36393F;
    }
    </style>
    <center>
        <h3>Capa</h3>
        <?php echo "<img src=./upload/$capa width='200'>"?>

        <h3>Código </h3>
        <?php echo "$codigo";?>

        <h3>ISBN </h3>
        <?php echo "$isbn";?>

        <h3>Título</h3>
        <?php echo "$titulo";?>

        <h3>Autor(a)</h3>
        <?php echo "$autor";?>

        <h3>Editora</h3>
        <?php echo "$editora";?>

        <h3>Ano</h3>
        <?php echo "$ano";?>

        <h3>Sinopse</h3>
        <?php echo "$sinopse";?>

        <h3>Data do Empréstimo</h3>
        <input type="date" name="data_emprestimo">

        <h3>Data da Devolução</h3>
        <input type="date" name="data_devolucao">

        <h3>Leitores</h3>
        <select>

        </select>

        <h3>Observações</h3>
        <textarea name="obs" placeholder="Insira Observações Aqui"><?php echo "$obs";?></textarea>

        <input type=submit value="Salvar" name=salvar>
        <input type="button" value="Não" onclick="window.history.back()">
    </center>
</body>

</html>