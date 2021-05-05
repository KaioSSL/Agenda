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
		$_query = "SELECT * FROM contatos where login = '$_login'";
	}else if($_op==1){
		$_query = "SELECT * FROM contatos WHERE nome like '$_filtro%' and login = '$_login'";
	}else if($_op==2){
		$_query = "SELECT * FROM contatos WHERE tel like '$_filtro%' and login = '$_login'";
	}else if($_op==3){
		$_query = "SELECT * FROM contatos WHERE email like '$_filtro%' and login = '$_login'";
	}
	$_resultado = $_SQL->sql_query($_query);
	
	$_retorno = "<center><h1>Contatos do Usuario $_login</h1><center>";
	$_retorno .= "<center><table>";
	$_retorno .= "<tr>";
	$_retorno.="<td>Nome</td>";
	$_retorno.="<td>Telefone</td>";
	$_retorno.="<td>Email</td>";
    $_retorno.="<td>Deletar</td>";
    $_retorno.="<td>Alterar</td>";
	$_retorno .="</tr>";
	
	while($_consulta = mysql_fetch_array($_resultado)){
		$_retorno .= "<tr>";
        $_retorno .= "<td>" . $_consulta['nome'] ."</td>";
        $_retorno .= "<td>" . $_consulta['tel'] . "</td>";
        $_retorno .= "<td>" . $_consulta['email'] . "</td>";
        $_id = $_consulta['id_contato'];
        $_retorno .= "<td><a href='../html/deletarContato.php?id=". $_id ."'</a><img src='../img/deletarContato.png' class='icon2'></td>";
        $_retorno .= "<td><a href='../html/alterarContato.php?id=".$_id."'</a><img src='../img/alterarContato.png' class='icon2'></td>";
        $_retorno .= "</tr>";
    }
    $_retorno .= "</table></center>";

    echo $_retorno;
	
?>
