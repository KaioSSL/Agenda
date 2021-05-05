<?php
    include "../php/session_recup.php";
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
                <div class="boxForm">
					<h1> Cadastro de Contato</h1>
					<form name="cadastroContato" action="../php/cadastroContato.php">
						 <spam>Nome:</spam> <input type="text" name="nome" onkeyup="mask_nome(cadastroContato.nome)" required><br>
						<spam>Telefone:</spam> <input type="text" id="tel" name="tel" maxlength="16" onkeypress="mask_tel(cadastroContato.tel)"  onblur="validarTel(cadastroContato.tel)" onkeyup="isNumber(cadastroContato.tel)" required><br>
						<spam>Email:</spam> <input type="email" name="email" required><Br>
						<input type="submit" value="Cadastrar" class="buttonForm" name="cadastro">
                    </form>
                </div>
            </div>
        
        
        </div>
        
    
    
    
    
    
    </body>
</html>
