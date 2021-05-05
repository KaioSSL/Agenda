<?php 
    include "ConnectionFactory.php";
    if(isset($_REQUEST['deletar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "DELETE FROM agenda WHERE id_agenda = $_id";
        $_SQL->sql_query($_query);
        echo "<script> location.href = '../html/mainCompromissos.php';
                        alert('Deletado com Sucesso');</script>";
    }else{
        header('location:../html/mainCompromissos.php');
    }
?>