<?php
	include "ConnectionFactory.php";
	if(isset($_REQUEST["cadastro"])){
		session_start();
		$_nome = $_REQUEST["nome"];
		$_tel = $_REQUEST["tel"];
		$_email = $_REQUEST["email"];
		$_login = $_SESSION["usuario"];
		$_query = "INSERT INTO contatos(nome,tel,email,login) VALUES('$_nome','$_tel','$_email','$_login')";
		$_SQL = new ConnectionFactory();
		$_SQL->sql_query($_query);
		echo "<script> location.href = '../html/mainContatos.php';
                        alert('Cadastrado com Sucesso');</script>";
		
		}

?>
