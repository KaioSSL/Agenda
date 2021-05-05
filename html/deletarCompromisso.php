<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM agenda WHERE id_agenda = '$_id'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_data = $_resultado['dataAgenda'];
        $_hora = $_resultado['hora'];
        $_assunto = $_resultado['assunto'];
    }else{
        header('location:mainCompromissos.php');
        
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agenda Pessoal</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <body>
        <div class = "boxCentro">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxConteudo">
                <div class="contentBar">
                    <a href="../html/mainCompromissos.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <div class="boxForm">
					<h1> Alterar Compromisso</h1>
					<form name="cadastroCompromisso" action="../php/deletarCompromisso.php">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
                        <spam>Data:</spam> <input type="date" name="data" value="<?php echo $_data; ?>"><br>
						<spam>Hora:</spam> <input type="time" name="hora" maxlength="14" value="<?php echo $_hora; ?>"><br>
						<spam>Assunto:</spam><input type="text" name="assunto"value="<?php echo $_assunto; ?>"><Br>
						<input type="submit" value="Deletar" class="buttonForm" name="deletar">
                    </form>
                </div>
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>
