<?php 
session_start();
$login=$_SESSION['login'];
if($login!='logado'){
    header("location: index.php");
};
?>
<a href="criar_conta.php" title="Login"><input name=criar_conta type=button value="Criar Conta"></a>
<?php if ($_SESSION['perfil']>0)
echo '<a href="inserir livro.php" title="Adicionar Novo Livro"><input type="button" value="Adicionar Novo Livro"></a>'
?>
<a href="sobre.php" title="Sobre"><input type=button value="Sobre"></a>
<?php if ($_SESSION['perfil']>0)
echo '<a href="usuarios cadastrados.php" title="Ver Usuáros Cadastrados"><input type=button value="Usuários Cadastrados"></a>'
?>
<a href="log out.php" title="Sair"><input type="button" value=Sair></a>
Usuário:<?php echo $_SESSION['username'];?> Perfil:<?php echo $_SESSION['perfil'];?>