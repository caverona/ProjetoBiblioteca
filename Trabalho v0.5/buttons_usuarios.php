<?php 
//Tentei fazer botões que mudem entre crescente e decrescente mas não consegui por enquanto
	$sql="select * from tb_usuarios";
	if(isset($_POST['nome_button']))
	{
		$sql="select * from tb_usuarios order by nome asc";
	}
	
    if(isset($_POST['email_button']))
	{
		$sql="select * from tb_usuarios order by email asc";
	}
	
	if(isset($_POST['senha_button']))
	{
		$sql="select * from tb_usuarios order by senha asc";
	}
	
	include "conexao.php";
	$usuario = $conn -> prepare($sql);
	$usuario -> execute();
	$conn = null;
?>