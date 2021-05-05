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
        <script type="text/javascript" src="../js/masks.js"></script>
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
					<h1> Alterar Contato</h1>
					<form name="alterarContato" action="../php/alterarContato.php">
                        <input type="hidden" value="<?php echo $_REQUEST['id']?>" name="id">
						 <spam>Nome:</spam> <input type="text" name="nome" value ="<?php echo $_nome; ?>" onkeyup="mask_nome(alterarContato.nome)" required><br>
						<spam>Telefone:</spam> <input type="text" onkeypress="mask_tel(alterarContato.tel)" onkeyup="isNumber(alterarContato.tel)" id="tel" name="tel" maxlength="16" value ="<?php echo $_tel; ?>" onblur="validarTel(alterarContato.tel)" required><br>
						<spam>Email:</spam> <input type="email" name="email" value ="<?php echo $_email; ?>" required><Br>
						<input type="submit" value="Alterar" class="buttonForm" name="alterar">
                    </form>
                </div>
            
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>