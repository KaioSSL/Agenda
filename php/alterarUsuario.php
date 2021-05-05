<?php
    session_start();
    include "ConnectionFactory.php";
    $_SQL = new ConnectionFactory();
    if(isset($_REQUEST['alterar'])){
        $_loginAtual = $_SESSION['usuario'];
        $_query = "SELECT * FROM usuario WHERE login = '$_loginAtual'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_senha = $_resultado['senha'];
        $_nome = $_REQUEST['nome'];
        $_tel = $_REQUEST['tel'];
        $_email = $_REQUEST['email'];
        $_senhaAtual = $_REQUEST['senhaAtual'];
        $_senhaNova = $_REQUEST['senhaNova'];
        $_loginNovo = $_REQUEST['login'];
        if($_senhaNova == ""){
            $_senhaNova = $_resultado['senha'];
        }
        if($_senha == $_senhaAtual){
            $_query = "UPDATE contatos SET login = 'CHANGER' WHERE login = '$_loginAtual'";
            $_SQL->sql_query($_query);
            $_query = "DELETE FROM usuario where login = '$_loginAtual'";
            $_SQL->sql_query($_query);
            $_query = "INSERT INTO usuario(login,nome,senha,email,tel,data_registro) VALUES('$_loginNovo','$_nome','$_senhaNova','$_email','$_tel',curdate())";
            $_SQL->sql_query($_query);
            $_query = "UPDATE contatos SET login= '$_loginNovo' WHERE login = 'CHANGER'";
            $_SQL->sql_query($_query);
            $_SESSION['usuario']= $_loginNovo;
            echo "<script>location.href='../html/mainUsuario.php';alert('Usuario Alterado com Sucesso');</script>";
        }else{
            echo "<script>location.href='../html/mainUsuario.php';alert('Senha incorreta');</script>";
        }
    }else if(isset($_REQUEST['deletar'])){
        $_login = $_SESSION['usuario'];
        $_query = "SELECT * FROM usuario WHERE login = '$_login'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_senha = $_resultado['senha'];
        $_senhaAtual = $_REQUEST['senhaAtual'];
        if($_senha == $_senhaAtual){
            $_query = "DELETE  agenda,contatos FROM agenda INNER JOIN contatos on contatos.id_contato = agenda.id_contato  WHERE agenda.id_contato = contatos.id_contato AND contatos.login ='$_login'";
            $_SQL->sql_query($_query);
            $_query = "DELETE FROM usuario WHERE login = '$_login'";
            $_SQL->sql_query($_query);
            include "mainSair.php";
        }else{
            echo "<script>location.href='../html/mainUsuario.php';alert('Senha incorreta');</script>";
        }
    }
?>