<!DOCTYPE html>
<?php
$codigo = $_GET['codigo'];
$titulo = $_GET['titulo'];
if(isset($_POST['excluir'])){
    $sql="delete from tb_livros where id_livros='$codigo'";
    include "conexao.php";
    $livro_exc = $conn -> prepare($sql);
    $livro_exc -> execute();
    $conn=null;
    echo "<script>
    alert('Livro Excluido')
    window.location.href='1-biblioteca online.php';
    </script>";
};
?>
<html language="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Excluir</title>
</head>

<body>
    <style>
    body {
        color: white;
        background-color: #36393F;
    }
    </style>
    Tem certeza de que deseja excluir <?php echo "$titulo" ?> ?
    <form method=post>
        <input type="submit" name=excluir value="Sim">
        <input type="button" value="Não" onclick="window.history.back()">
    </form>
</body>

</html>