<?php
    include "../php/session_recup.php";
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
					<h1> Cadastro de Compromisso</h1>
					<form name="cadastroCompromisso" action="../php/cadastroCompromisso.php">
				        <spam>Contatos:</spam>
                       
                        <?php
                           echo "<select name='boxContatos' class='selectCompromisso'>";
                            include "../php/ConnectionFactory.php";
                            $_SQL = new ConnectionFactory();
                            $_login = $_SESSION['usuario'];
                            $_query = "SELECT * FROM contatos WHERE contatos.login = '$_login'";
                            $_SQL->comboContatos($_query);
                            echo " </select> <br>";
                        ?>
                        
                        <spam>Data:</spam> <input type="date" name="data" required><br>
						<spam>Hora:</spam> <input type="time" name="hora" maxlength="14" required><br>
						<spam>Assunto:</spam><textarea name="assunto" rows="10" cols="25" required></textarea><Br>
						<input type="submit" value="Cadastrar" class="buttonForm" name="cadastro">
                    </form>
                </div>
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>
