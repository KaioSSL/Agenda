<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST["logar"])){
        $_sql = new ConnectionFactory();
        $_login = $_REQUEST["login"];
        $_senha = $_REQUEST["senha"];
        $_query = "SELECT * FROM usuario WHERE login = '$_login' AND senha = '$_senha'";
        if($_sql->login($_query)){
            session_start();
            $_SESSION['usuario']=$_login;
            header('location:../html/main.php');
        }else{
            echo "<script>alert('Usuário não encontrado');
                location.href = '../html/login.php';</script>";
        }
    }else{
    }
    

?>
