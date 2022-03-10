<!DOCTYPE html>
<?php
$codigo = $_GET['codigo'];
$nome = $_GET['nome'];
if(isset($_POST['excluir'])){
    $sql="delete from tb_usuarios where id_usuarios='$codigo'";
    include "conexao.php";
    $usuario_exc = $conn -> prepare($sql);
    $usuario_exc -> execute();
    $conn=null;
    echo "<script>
    alert('Usuário Excluido')
    window.location.href='usuarios cadastrados.php';
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
    Tem certeza de que deseja excluir <?php echo "$nome" ?> ?
    <form method=post>
        <input type="submit" name=excluir value="Sim">
        <input type="button" value="Não" onclick="window.history.back()">
    </form>
</body>

</html>