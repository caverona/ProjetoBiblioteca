<?php 
//Tentei fazer botões que mudem entre crescente e decrescente mas não consegui por enquanto
	$sql="select * from tb_livros";
	if(isset($_POST['isbn_button']))
	{
		$sql="select * from tb_livros order by isbn asc";
	}
	
    if(isset($_POST['titulo_button']))
	{
		$sql="select * from tb_livros order by titulo asc";
	}
	
	if(isset($_POST['autor_button']))
	{
		$sql="select * from tb_livros order by autor asc";
	}

    if(isset($_POST['editora_button']))
	{
		$sql="select * from tb_livros order by editora asc";
	}

	if(isset($_POST['ano_button']))
	{
		$sql="select * from tb_livros order by ano asc";
	}
	elseif(isset($_POST['ano_button'])){
		$sql="select * from tb_livros order by ano desc";
	}
	
	include "conexao.php";
	$livros = $conn -> prepare($sql);
	$livros -> execute();
	$conn = null;
?>