<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['deletar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_nome = $_REQUEST['nome'];
        $_query = "DELETE FROM agenda WHERE id_contato = $_id";
        $_SQL->sql_query($_query);
        $_query = "DELETE FROM contatos WHERE id_contato = $_id";
        $_SQL->sql_query($_query);
        echo "<script> location.href = '../html/mainContatos.php';
                        alert('Deletado com Sucesso');</script>";
    }else{
        header('location:../html/mainContatos.php');
        
    }
    

?>