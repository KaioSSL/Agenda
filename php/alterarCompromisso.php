<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_data = $_REQUEST['data'];
        $_hora = $_REQUEST['hora'];
        $_assunto = $_REQUEST['assunto'];
        $_query = "UPDATE agenda SET dataAgenda = '$_data', hora = '$_hora', assunto = '$_assunto' WHERE id_agenda = $_id";
        $_SQL->sql_query($_query);
        echo "<script> location.href = '../html/mainCompromissos.php';
                        alert('Alterado com Sucesso');</script>";
    }else{
        header('location:../html/mainCompromissos.php');
        
    }
?>