<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_nome = $_REQUEST['nome'];
        $_tel = $_REQUEST['tel'];
        $_email = $_REQUEST['email'];
        $_id = $_REQUEST['id'];
        $_query = "UPDATE contatos SET nome = '$_nome', tel = '$_tel', email = '$_email' WHERE id_contato = $_id";
        $_SQL->sql_query($_query);
        echo "<script> location.href = '../html/mainContatos.php';
                        alert('Alterado com Sucesso');</script>";
        
    }else{
        header('location:../html/mainContatos.php');
        
    }




?>