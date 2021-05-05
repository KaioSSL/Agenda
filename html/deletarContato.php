<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST["id"];
        $_query = "SELECT * FROM contatos WHERE id_contato = '$_id'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_nome = $_resultado['nome'];
        $_tel = $_resultado['tel'];
        $_email = $_resultado['email'];
    }else{
        header('location:../html/mainContatos.php');
        
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
                    <a href="../html/mainContatos.php"><img src="../img/voltar.png" class="icon"></a>
                    
                </div>
                <div class="boxForm" name="boxForm" id="boxForm">
                    <div class="boxForm">
					<h1> Alterar Contato</h1>
					<form name="deletarContato" action="../php/deletarContato.php">
                        <input type="hidden" value="<?php echo $_REQUEST['id']?>" name="id">
						 <spam>Nome:</spam> <input type="text" name="nome" value ="<?php echo $_nome; ?>" disabled><br>
						<spam>Telefone:</spam> <input type="text" name="tel" maxlength="14" value ="<?php echo $_tel; ?>" disabled><br>
						<spam>Email:</spam> <input type="email" name="email" value ="<?php echo $_email; ?>" disabled><Br>
						<input type="submit" value="Deletar" class="buttonForm" name="deletar">
                    </form>
                </div>
                </div>
            
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>