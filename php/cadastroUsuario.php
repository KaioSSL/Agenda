<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST["cadastrar"])){
        $_sql = new ConnectionFactory();
        $_nome = $_REQUEST["nome"];
        $_tel = $_REQUEST["tel"];
        $_email = $_REQUEST["email"];
        $_login = $_REQUEST["login"];
        $_senha = $_REQUEST["senha"];
        
        $_query = "INSERT INTO Usuario(login,senha,email,data_registro,nome,tel) VALUES('$_login','$_senha','$_email',curdate(),'$_nome','$_tel')";
        $_sql->sql_query($_query);
        echo "<script> location.href = '../html/login.php';
                        alert('Cadastrado com Sucesso');</script>";
    }
    
    
    
?>