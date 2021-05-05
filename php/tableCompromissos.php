<?php
    include "ConnectionFactory.php";
    session_start();
    $_login = $_SESSION['usuario'];
    if(isset($_REQUEST["filtro"])){
        $_op = $_REQUEST["op"];
        $_filtro = $_REQUEST["filtro"];
    }else{
        $_op = 0;
        $_filtro = "";
    }
    $_SQL = new ConnectionFactory();
    if($_op == 0){
        $_query = "SELECT * FROM agenda,contatos where agenda.id_contato = contatos.id_contato AND contatos.login = '$_login'";
	}else if($_op==1){
		$_query = "SELECT * FROM agenda,contatos where contatos.nome like '$_filtro%' AND agenda.id_contato = contatos.id_contato AND contatos.login='$_login'";
	}else if($_op==2){
		$_query = "SELECT * FROM agenda,contatos where agenda.dataAgenda like '$_filtro%' AND agenda.id_contato = contatos.id_contato AND contatos.login='$_login'";
	}else if($_op==3){
		$_query = "SELECT * FROM agenda,contatos where agenda.hora like '$_filtro%' AND agenda.id_contato = contatos.id_contato AND contatos.login='$_login'";
	}else if($_op==4){
        $_query = "SELECT * FROM agenda,contatos where agenda.assunto like '$_filtro%' AND agenda.id_contato = contatos.id_contato AND contatos.login='$_login'";
        
    }
    $_resultado = $_SQL->sql_query($_query);
    $_retorno = "<center><h1>Compromissos do Usuario $_login</h1><center>";
    $_retorno .= "<center><table>";
	$_retorno .= "<tr>";
	$_retorno.="<td>Nome</td>";
	$_retorno.="<td>Data</td>";
	$_retorno.="<td>Hora</td>";
    $_retorno.="<td>Assunto</td>";
    $_retorno.="<td>Deletar</td>";
    $_retorno.="<td>Alterar</td>";
	$_retorno .="</tr>";
    while($_consulta = mysql_fetch_array($_resultado)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_consulta['nome']."</td>";
        $_retorno.="<td>".$_consulta['dataAgenda']."</td>";
        $_retorno.="<td>".$_consulta['hora']."</td>";
        $_retorno.="<td>".$_consulta['assunto']."</td>";
        $_id = $_consulta[0];
        $_retorno .= "<td><a href='../html/deletarCompromisso.php?id=". $_id ."'</a><img src='../img/deletarCompromisso.png' class='icon2'></td>";
        $_retorno .= "<td><a href='../html/alterarCompromisso.php?id=".$_id."'</a><img src='../img/alterarCompromisso.png' class='icon2'></td>";
        $_retorno .= "</tr>";
    }
    echo "</table></center>";
    echo $_retorno;
?>