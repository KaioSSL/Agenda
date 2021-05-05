<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastro'])){
        $_SQL = new ConnectionFactory();
        $_data = $_REQUEST['data'];
        $_hora = $_REQUEST['hora'];
        $_assunto = $_REQUEST['assunto'];
        $_id = $_REQUEST['boxContatos'];
        $_query = "INSERT INTO agenda(id_contato,dataAgenda,hora,assunto) VALUES ($_id,'$_data','$_hora','$_assunto')";
        $_SQL->sql_query($_query);
        echo "<script> location.href = '../html/mainCompromissos.php';
                        alert('Cadastrado com Sucesso');</script>";
    }else{
        header('location:../html/mainCompromissos.php');
    }
    
?>